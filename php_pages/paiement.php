<?php
require_once "../php/fonctions_utiles.php";
require_once "../php/getapikey.php";


if (!isset($_SESSION['email'])) {
    header("Location: ../php_pages/connexion.php");
    exit();
}
if (!isset($_GET['destination'])){
    header("Location: user.php");
    exit();
}
$destination = $_GET['destination'];
if (!isset($_SESSION["email"])){
    header("Location: connexion.php");
    exit();
}
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
            if ($content[$i]["travels"][$b]["destination"] == $destination){
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



$transaction = uniqid();
$montant = $content[$index_email]["travels"][$index_travel]["prix"];
$vendeur = "MI-3_B";
$retour = "http://localhost:8888/Projet/php_pages/confirmation_paiement.php";
$api_key = getAPIKey($vendeur);
$content[$index_email]["travels"][$index_travel]["transaction"] = $transaction;
file_put_contents($file, json_encode($content, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
$control = md5($api_key . "#" . $transaction . "#" . $montant . "#" . $vendeur . "#" . $retour . "#");
if (!is_numeric($montant)){
    header("Location: destination.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Confirmation de Paiement voyage à <?php echo $destination?></title>
    <link rel="icon" type="image" href="../image/logo-site.webp">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/paiement.css">



    <meta charset="UTF-8">
</head>
<body>

<?php
require_once "../php_pages/header.php";
?>

<main>
    <h1>Récapitulatif de la commande pour le voyage à <?php echo $destination?></h1>
    <p>Montant total : <?php echo $montant . "€";
        if ($content[$index_email]["travels"][$index_travel]["person"] > 1){
            echo " soit " . $montant/$content[$index_email]["travels"][$index_travel]["person"] . " €" . " par personne";
        }
    ?></p>
    <p>Numéro de transaction : <?php echo $transaction?></p>
    <p>Vendeur : <?php echo $vendeur?></p>
<form action='https://www.plateforme-smc.fr/cybank/index.php' method='POST'>
    <input type='hidden' name='transaction' value="<?php echo $transaction?>">
    <input type='hidden' name='montant' value="<?php echo $montant?>">
    <input type='hidden' name='vendeur' value="<?php echo $vendeur?>">
    <input type='hidden' name='retour' value="<?php echo $retour?>">
    <input type='hidden' name='control' value="<?php echo $control?>">
    <input type='submit' value="Valider et payer">
</form>

</main>


<?php
require_once "../php_pages/footer.php";
?>


</body>
</html>

