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
        <h1>Les Fidji</h1>
        <img class="main-image" src="../image/les-fidji.jpeg" alt="../image/les-fidji.jpeg">
    </div>

    <div class="destination-text">
        <p>
            Avec ses eaux cristallines et son climat idyllique, Fidji est plus qu’une destination de rêve : c’est aussi un refuge fiscal attractif. 0 % d’impôt sur les plus-values, les successions et les revenus étrangers, un secret bancaire préservé et un cadre favorable aux entreprises en font une option stratégique pour les investisseurs et expatriés.
            Ajoutez à cela 333 îles paradisiaques et une qualité de vie exceptionnelle, et vous obtenez l’équilibre parfait entre optimisation fiscale et évasion tropicale.
            Fidji vous attend.
        </p>
    </div>
    <form method="post" action="../php_pages/user_register_travel.php">
        <input type="hidden" name="destination" value="fidji">
        <button type="submit" class="reservation-button">Réserver</button>
    </form>

   

    <div class="maps">
        <img src="../image/fidji-maps.png" alt="Fidji-Maps">
        <br>
        <p>Carte Les Fidji</p>
    </div>
</main>

<?php
require_once "../php_pages/footer.php";
?>
</body>

</html>
