<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Les-Samoa-Americaine</title>
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
        <h1>LES SAMOA-AMERICAINES</h1>
        <img class="main-image" src="../image/les-samoa-americaine.jpeg" alt="../image/les-samoa-americaine.jpg">
    </div>


    <div class="destination-text">
        <p>
            Les Samoa-Américaines, territoire non incorporé des États-Unis dans le Pacifique Sud, se distinguent par
            leur autonomie fiscale et leurs paysages paradisiaques. Leur code fiscal indépendant permet une fiscalité
            plus avantageuse que celle des États-Unis, avec des taux réduits et des exonérations pour les entreprises.
            L’archipel offre des opportunités économiques variées dans le tourisme, la pêche et l’industrie
            agroalimentaire. Grâce à ses incitations fiscales et ses zones franches, il constitue un choix stratégique
            pour les investisseurs cherchant à allier rentabilité et cadre de vie exceptionnel.
        </p>
    </div>




    <div class="maps">
        <img src="../image/samoa-americaine-maps.png" alt="Samoa-Americaine-maps">
        <br>
        <p>Carte Samoa-américaine</p>
    </div>
    <form method="post" action="../php_pages/user_register_travel.php">
        <input type="hidden" name="destination" value="samoa">
        <button type="submit" class="reservation-button">Réserver</button>
    </form>

</main>


<?php
require_once "../php_pages/footer.php";
?>


</body>
</html>