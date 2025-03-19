<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Jersey</title>
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
        <h1>Jersey</h1>
        <img class="main-image" src="../image/jersey.jpeg" alt="../image/jersey.jpeg">
    </div>

    <div class="destination-text">
        <p>
        Jersey, petite île anglo-normande située entre la France et le Royaume-Uni, est un véritable paradis fiscal prisé des entreprises
         et des grandes fortunes. Grâce à son régime fiscal particulièrement attractif, l'île applique un impôt sur les sociétés de 0 % 
         pour la majorité des entreprises, un taux réduit de 10 % pour le secteur financier et un taux plafonné à 20 % pour certaines 
         activités spécifiques. De plus, il n'existe ni impôt sur les plus-values, ni impôt sur la fortune, ni droits de succession, offrant
          ainsi un environnement idéal pour l'optimisation fiscale et la gestion de patrimoine.
        </p>
    </div>
    <form method="post" action="../php_pages/user_register_travel.php">
        <input type="hidden" name="destination" value="jersey">
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
