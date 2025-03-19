<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title> Malte</title>
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
        <h1> Malte</h1>
        <img class="main-image" src="../image/malte.jpg" alt="../image/malte.jpeg">
    </div>

    <div class="destination-text">
        <p>
        Malte est une destination de choix pour les entrepreneurs et les investisseurs en quête d’un environnement fiscal attractif au sein 
        de l’Union européenne. Grâce à un système fiscal avantageux, l’île offre un taux d’imposition sur les sociétés de 35 %, mais avec 
        un mécanisme de remboursement pouvant réduire l’impôt effectif à environ 5 % pour les actionnaires étrangers. De plus, il n’existe 
        ni taxe sur les plus-values pour les non-résidents, ni impôt sur la fortune, ni droits de succession, ce qui en fait un cadre idéal 
        pour l’optimisation fiscale et la gestion de patrimoine.
        </p>
    </div>
    <form method="post" action="../php_pages/user_register_travel.php">
        <input type="hidden" name="destination" value="malte">
        <button type="submit" class="reservation-button">Réserver</button>
    </form>


    

    <div class="maps">
        <img src="../image/malte-maps.png" alt="Malte-Maps">
        <br>
        <p>Carte de Malte</p>
    </div>
</main>

<?php
require_once "../php_pages/footer.php";
?>
</body>

</html>
