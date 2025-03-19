<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Chypre</title>
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
        <h1>Chypre</h1>
        <img class="main-image" src="../image/chypre.jpeg" alt="../image/chypre.jpeg">
    </div>

    <div class="destination-text">
        <p>
        Chypre est l’une des destinations les plus attractives en Europe pour les entrepreneurs et les investisseurs en quête 
        d’optimisation fiscale. Grâce à son taux d’imposition sur les sociétés parmi les plus bas de l’Union européenne, fixé à 12,5 %,
         l’île offre un cadre fiscal avantageux pour les entreprises internationales. De plus, Chypre applique une exonération totale
          sur les plus-values mobilières, ainsi qu’une absence d’impôt sur les dividendes perçus par les sociétés étrangères, ce qui en
           fait un hub stratégique pour la gestion de patrimoine et les investissements.
        </p>
    </div>
    <form method="post" action="../php_pages/user_register_travel.php">
        <input type="hidden" name="destination" value="chypre">
        <button type="submit" class="reservation-button">Réserver</button>
    </form>

    
    <div class="maps">
        <img src="../image/chypre-maps.png" alt="Chypre-Maps">
        <br>
        <p>Carte de Chypre</p>
    </div>
</main>

<?php
require_once "../php_pages/footer.php";
?>
</body>

</html>
