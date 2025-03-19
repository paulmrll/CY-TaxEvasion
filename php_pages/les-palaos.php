<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Anguilla</title>
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
        <h1>Les Palaos</h1>
        <img class="main-image" src="../image/les-palaos.jpg" alt="../image/les-palaos.jpeg">
    </div>

    <div class="destination-text">
        <p>
            Petit paradis méconnu, Palaos offre 0 % d’impôt sur le revenu, les plus-values et les successions, ainsi qu’un cadre discret pour les investisseurs. Avec ses 500 îles aux eaux turquoise, une stabilité politique et une qualité de vie exceptionnelle, c’est l’endroit rêvé pour allier optimisation fiscale et évasion tropicale.
Pourquoi choisir entre prospérité et paradis ? Aux Palaos, vous pouvez avoir les deux.
        </p>
    </div>

    <form method="post" action="../php_pages/user_register_travel.php">
        <input type="hidden" name="destination" value="palaos">
        <button type="submit" class="reservation-button">Réserver</button>
    </form>
    

    <div class="maps">
        <img src="../image/les-palaos-maps.png" alt="Palaos-Maps">
        <br>
        <p>Carte Les Palaos</p>
    </div>
</main>

<?php
require_once "../php_pages/footer.php";
?>
</body>

</html>
