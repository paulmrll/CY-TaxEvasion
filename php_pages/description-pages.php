<?php
session_start();
if (!isset($_GET["destination"])) {
    header('Location: ../php_pages/destination.php');
    exit();
}
$destination = $_GET["destination"];
$destination = strtolower($destination);
$destination[0] = strtoupper($destination[0]);
$jsonFile = "../data/travel.json";
if (!file_exists($jsonFile)) {
    header('Location: ../php_pages/add_travel.php');
    exit();
}
$content = json_decode(file_get_contents($jsonFile), true);
if ($content == null) {
    header('Location: ../php_pages/add_travel.php');
    exit();
}
$a = 0;
$i = -1;
for ($t = 0; $t < count($content); $t++) {
    if ($content[$t]['destination'] === $destination) {
        $a = 1;
        $i = $t;
        break;
    }
}
if ($a === 0) {
    header('Location: ../php_pages/add_travel.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $destination ?></title>
    <link rel="icon" type="image" href="../image/logo-site.webp">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/destination-description.css">


</head>

<body>

<?php
require_once "../php_pages/header.php";
?>

<main>
    <div class="title-container">
        <h1><?php echo $content[$i]["name"] ?></h1>
        <img class="main-image" src="<?php echo $content[$i]["image"] ?>" alt="<?php echo $content[$i]["image"] ?>">
    </div>

    <div class="destination-text">
        <p>
            <?php echo $content[$i]['description']; ?>
        </p>
    </div>

    <a class="button-reserver" href="user_register_travel.php?destination=<?php echo $content[$i]['destination']; ?>">Réserver</a>



    <div class="maps">
        <img src="<?php echo $content[$i]["image_maps"] ?>" alt="<?php echo $content[$i]["destination"] ?>-maps">
        <br>
        <p>Carte <?php echo $content[$i]["destination"] ?></p>
    </div>
</main>

<?php
require_once "../php_pages/footer.php";
?>
</body>

</html>