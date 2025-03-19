<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Émirats arabes unis</title>
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
        <h1> Émirats arabes unis</h1>
        <img class="main-image" src="../image/EAU.jpg" alt="../image/EAU.jpeg">
    </div>

    <div class="destination-text">
        <p>
        Les Émirats arabes unis (EAU) sont l’un des paradis fiscaux les plus attractifs au monde, offrant un environnement fiscal ultra-compétitif
         et une stabilité économique exceptionnelle. Longtemps connus pour leur absence totale d’impôt sur le revenu des particuliers et des 
         sociétés, les EAU maintiennent un taux d’imposition de 0 % pour la plupart des entreprises établies dans les zones franches, ainsi qu’une
          absence de taxe sur les dividendes, les plus-values et la fortune. Depuis 2023, un impôt sur les sociétés de 9 % a été introduit, mais
           il reste l’un des plus bas au monde et ne s’applique pas aux entreprises dont les bénéfices sont inférieurs à un certain seuil.
        </p>
    </div>
    <form method="post" action="../php_pages/user_register_travel.php">
        <input type="hidden" name="destination" value="EAU">
        <button type="submit" class="reservation-button">Réserver</button>
    </form>

    

    <div class="maps">
        <img src="../image/EAU-maps.png" alt="Palaos-Maps">
        <br>
        <p>Carte Des Emirats Arabes Unis</p>
    </div>

</main>

<?php
require_once "../php_pages/footer.php";
?>
</body>

</html>
