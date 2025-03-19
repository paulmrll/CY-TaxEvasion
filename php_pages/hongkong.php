<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Hong-Kong</title>
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
        <h1>Hong-Kong</h1>
        <img class="main-image" src="../image/hongkong.jpg" alt="../image/hongkong.jpeg">
    </div>

    <div class="destination-text">
        <p>
        Hong Kong est une métropole dynamique et un centre financier de premier plan, souvent considéré comme un véritable paradis fiscal
         pour les entreprises et les investisseurs du monde entier. Grâce à son régime fiscal ultra-compétitif, cette région administrative
          spéciale de la Chine offre un impôt sur les sociétés plafonné à 16,5 % et un impôt sur le revenu progressif ne dépassant pas 15 %.
           Mieux encore, il n’existe ni taxe sur la valeur ajoutée (TVA), ni impôt sur les dividendes, les gains en capital ou les successions,
            faisant de Hong Kong un environnement fiscal idéal pour l’optimisation financière.
        </p>
    </div>
    <form method="post" action="../php_pages/user_register_travel.php">
        <input type="hidden" name="destination" value="hongkong">
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
