<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nous contacter</title>
    <link rel="icon" type="image" href="../image/logo-site.webp">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/about-us.css">


</head>
<body>


<?php
require_once "../php_pages/header.php";
?>


<main>
    <div class="us">
        <h1>Qui Sommes-nous ?</h1>
        <div class="grid-container">
            <div class="presentation">
                <h2>Florian GOUPIL</h2>
            </div>
            <div class="presentation">
                <h2>Cyprien WINGERING</h2>
            </div>
            <div class="presentation">
                <h2>Paul MORILLE</h2>
            </div>

        </div>
        <div class="text">
            <p>Nous sommes 3 étudiants de <b>CY-tech</b>. Actuellement en deuxième année de prépa-intégrée dans la
                filière Mathématiques&nbsp;- Informatique
                option Physiques, nous devons dans le cadre de nos études développer un site internet. C'est ainsi que
                nous vous proposons
                un site de vacances basé sur l'économie.</p>
            <br>
            <p>Nous espérons que nos voyages vous plairont et vous satisferont. <br> Si vous avez des questions,
                n'hésitez pas à nous contacter à travers
                nos réseaux sociaux.
            </p>
        </div>
    </div>
    <div class="credit">
        <a href="https://cytech.cyu.fr" target="_blank"><img src="../image/CY_Tech.png" alt="CY_Tech"></a>
    </div>
</main>


<?php
require_once "../php_pages/footer.php";
?>


</body>
</html>