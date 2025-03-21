<?php
require_once "../php/fonctions_utiles.php";
require_once "../php/getapikey.php";


if (!isset($_SESSION['email'])) {
    header("Location: ../php_pages/connexion.php");
    exit();
}
if (!isset($_GET["status"]) && !isset($_GET["montant"]) && !isset($_GET["transaction"]) && !isset($_GET["vendeur"]) && !isset($_GET["control"])){
    header("Location: ../php_pages/user.php");
    exit();
}
$status = $_GET["status"];
$montant = $_GET["montant"];
$transaction = $_GET["transaction"];
$vendeur = $_GET["vendeur"];
$control = $_GET["control"];

$control_verification = getapikey($vendeur) . "#" . $transaction . "#" . $montant . "#" . $vendeur . "#" . $status . "#";



$file = "../data/travel-user.json";
if (!file_exists($file)){
    header("Location: destination.php");
    exit();
}
$content = json_decode(file_get_contents("../data/travel-user.json"), true);
if ($content == null){
    header("Location: destination.php");
    exit();
}
for ($i = 0; $i < count($content); $i++){
    if ($content[$i]["email"] === $_SESSION['email']){
        for ($b = 0; $b < count($content[$i]["travels"]); $b++){
            if ($content[$i]["travels"][$b]["transaction"] == $transaction){
                $index_email = $i;
                $index_travel = $b;
                break;
            }
        }
    }
}
if (!isset($index_travel) || !isset($index_email)){
    header("Location: destination.php");
    exit();
}
if (md5($control_verification) == $control && $status == "accepted"){
    $content[$index_email]["travels"][$index_travel]["reservation"] = "Payé";
    file_put_contents($file, json_encode($content, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    $a =1;
} else {
    $a = 0;
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Utilisateur</title>
    <link rel="icon" type="image" href="../image/logo-site.webp">
    <link rel="stylesheet" href="../css/styles.css">



    <meta charset="UTF-8">
</head>
<body>

<?php
require_once "../php_pages/header.php";
?>

<main>
    <h1>Confirmation de la commande pour le voyage à <?php echo $content[$index_email]["travels"][$index_travel]["destination"]?></h1>
    <p>Montant total : <?php echo $content[$index_email]["travels"][$index_travel]["prix"]?></p>
    <p>Numéro de transaction : <?php echo $transaction?></p>
    <p>Vendeur : CY TAXEVASION SARL</p>
    <p>Votre paiment à été <?php
        if ($a == 0){
            echo "refusé";
        } if ($a == 1){
            echo "accepté";
        }
    ?></p>
    <a href="../php_pages/travel-information.php?travel=<?php echo $content[$index_email]["travels"][$index_travel]["destination"]?>">Voir votre Voyage à <?php echo $content[$index_email]["travels"][$index_travel]["destination"]?></a>


</main>


<?php
require_once "../php_pages/footer.php";
?>


</body>
</html>

