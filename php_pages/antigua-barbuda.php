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
        <h1>Antigua et Barbuda</h1>
        <img class="main-image" src="../image/antigua-et-barbuda.jpg" alt="../image/antigua-barbuda.jpg">
    </div>

    <div class="destination-text">
        <p>
        Antigua-et-Barbuda offre 0 % d’impôt sur le revenu, les plus-values et la fortune, ainsi qu’aucune taxe sur les successions et donations.
Avec un passeport accessible dès 100 000 $, ouvrant les portes de 150 pays sans visa, et 365 plages paradisiaques, c’est la destination idéale pour allier optimisation fiscale et qualité de vie.
Investissez, installez-vous, profitez. Le paradis vous attend. 
        </p>
    </div>
    <form method="post" action="../php_pages/user_register_travel.php">
        <input type="hidden" name="destination" value="antigua">
        <button type="submit" class="reservation-button">Réserver</button>
    </form>

    

    <div class="maps">
        <img src="../image/antigua-barbuda-maps.png" alt="Samoa-Americaine-maps">
        <br>
        <p>Carte Antigua et Barbuda</p>
    </div>
</main>

<?php
require_once "../php_pages/footer.php";
?>
</body>

</html>
