<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Monaco</title>
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
        <h1>Monaco</h1>
        <img class="main-image" src="../image/monaco.jpeg" alt="../image/monaco.jpeg">
    </div>

    <div class="destination-text">
        <p>
        Monaco est une destination de prestige qui incarne à la fois luxe, stabilité et attractivité fiscale. Véritable paradis fiscal en Europe, 
        la Principauté se distingue par l'absence totale d'impôt sur le revenu pour les résidents (sauf les Français en vertu d'accords spécifiques)
        , ainsi que par l'absence d'impôt sur la fortune, sur les successions en ligne directe et sur les plus-values. Cette politique fiscale 
        avantageuse attire les entrepreneurs, les investisseurs et les grandes fortunes du monde entier, désireux de préserver et faire fructifier 
        leur patrimoine dans un cadre légal sécurisé.
        </p>
    </div>

    <form method="post" action="../php_pages/user_register_travel.php">
        <input type="hidden" name="destination" value="monaco">
        <button type="submit" class="reservation-button">Réserver</button>
    </form>
 

    <div class="maps">
        <img src="../image/monaco-maps.png" alt="Monaco-Maps">
        <br>
        <p>Carte de Monaco</p>
    </div>
</main>

<?php
require_once "../php_pages/footer.php";
?>
</body>

</html>
