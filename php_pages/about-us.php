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
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
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


<footer>
    <div class="footer-container">
        <div class="contact">
            <a href="../php_pages/contact.php" class="footer-contact">Nous contacter</a>
            <a href="../php_pages/about-us.php" class="footer-contact">Qui sommes-nous ?</a>
        </div>
        <div class="socials">
            <div>Nos réseaux :</div>
            <a class="twitter-logo" href="https://x.com/?mx=2" target="_blank"><img src="../image/twitter-logo.png"
                                                                                    alt="twitter-logo"></a>
            <a class="instagram-logo" href="https://www.instagram.com/" target="_blank"><img
                    src="../image/instagram-logo.png" alt="instagram-logo.png"></a>
        </div>
    </div>
</footer>


</body>
</html>