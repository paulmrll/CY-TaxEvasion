<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Panama</title>
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
        <h1>Le Panama</h1>
        <img class="main-image" src="../image/le-panama.jpg" alt="../image/le-panama.jpg">
    </div>

    <div class="destination-text">
        <p>
            Avec 0 % d’impôt sur les revenus étrangers, pas de taxe sur les successions ni les plus-values, et un secret bancaire reconnu, le Panama est une destination de choix pour les entrepreneurs et investisseurs. Son visa de résidence attractif et son économie dynamique en font un hub financier stratégique.
Ajoutez à cela des plages paradisiaques, une qualité de vie élevée et une fiscalité avantageuse : le Panama est l’équilibre parfait entre affaires et évasion tropicale.
        </p>
    </div>
    <form method="post" action="../php_pages/user_register_travel.php">
        <input type="hidden" name="destination" value="panama">
        <button type="submit" class="reservation-button">Réserver</button>
    </form>


 

    <div class="maps">
        <img src="../image/le-panama-maps.png" alt="Palaos-Maps">
        <br>
        <p>Carte Panama</p>
    </div>
</main>

<?php
require_once "../php_pages/footer.php";
?>
</body>

</html>
