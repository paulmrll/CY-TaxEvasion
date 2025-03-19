<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Caïmans</title>
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
        <h1> îles Caïmans</h1>
        <img class="main-image" src="../image/caimans.jpg" alt="../image/caimans.jpeg">
    </div>

    <div class="destination-text">
        <p>
        Les îles Caïmans sont l’un des paradis fiscaux les plus réputés au monde, attirant entreprises, investisseurs et grandes fortunes
         grâce à leur régime fiscal exceptionnel. L’archipel applique une politique de zéro impôt : il n’y a ni impôt sur le revenu, ni impôt
          sur les sociétés, ni taxe sur les plus-values, ni droits de succession. Cette fiscalité ultra-attractive en fait une destination 
          privilégiée pour les fonds d’investissement, les banques et les multinationales cherchant à optimiser leur structuration financière.
        </p>
    </div>
    <form method="post" action="../php_pages/user_register_travel.php">
        <input type="hidden" name="destination" value="caimans">
        <button type="submit" class="reservation-button">Réserver</button>
    </form>

   

    <div class="maps">
        <img src="../image/caïmans-maps.png" alt="îles Caïmans-Maps">
        <br>
        <p>Carte des îles Caïmans</p>
    </div>
</main>

<?php
require_once "../php_pages/footer.php";
?>
</body>

</html>
