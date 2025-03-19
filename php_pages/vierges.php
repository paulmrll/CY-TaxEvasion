<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title> Îles Vierges britanniques</title>
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
        <h1>  Îles Vierges britanniques</h1>
        <img class="main-image" src="../image/vierges.jpg" alt="../image/vierges.jpeg">
    </div>

    <div class="destination-text">
        <p>
        Les Îles Vierges britanniques (BVI) sont l’un des paradis fiscaux les plus prisés au monde, notamment pour la création de sociétés 
        offshore. Grâce à un régime fiscal extrêmement avantageux, l’archipel applique un impôt sur les sociétés de 0 %, aucune taxe sur les
         plus-values, ni impôt sur le revenu, ni droits de succession. Cette politique en fait une destination de choix pour les entrepreneurs,
        investisseurs et multinationales cherchant à optimiser leur fiscalité en toute légalité.
        </p>
    </div>
    <form method="post" action="../php_pages/user_register_travel.php">
        <input type="hidden" name="destination" value="vierges">
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
