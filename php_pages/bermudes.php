<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Bermudes</title>
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
        <h1>Bermudes</h1>
        <img class="main-image" src="../image/bermudes.jpg" alt="../image/bermudes.jpeg">
    </div>

    <div class="destination-text">
        <p>
        Les Bermudes, archipel paradisiaque situé dans l’Atlantique, sont bien plus qu’une destination de rêve : elles constituent
         l’un des centres financiers les plus attractifs au monde grâce à leur fiscalité ultra-avantageuse. Véritable paradis fiscal,
          l’archipel n’impose ni impôt sur le revenu, ni impôt sur les sociétés, ni impôt sur les plus-values, ni taxe sur les dividendes,
           offrant ainsi un environnement fiscal idéal pour les entreprises et les investisseurs cherchant à maximiser leurs profits.
        </p>
    </div>
    <form method="post" action="../php_pages/user_register_travel.php">
        <input type="hidden" name="destination" value="bermudes">
        <button type="submit" class="reservation-button">Réserver</button>
    </form>

    

    <div class="maps">
        <img src="../image/bermudes-maps.png" alt="Bermudes-Maps">
        <br>
        <p>Carte des Bermudes
        </p>
    </div>
</main>

<?php
require_once "../php_pages/footer.php";
?>
</body>

</html>
