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


<header>
    <div class="header-container">

        <div class="header-left">
            <a href="../index.php" class="header-link">CY-TAXEVASION </a>
        </div>

        <div class="header-slogan">THE HOLIDAYS YOUR WALLET NEED</div>
        <div class="header-right">
            <div class="header-voir-voyage">
                <a href="../php_pages/destination.php" class="header-link header-voir-voyage-text">Voir nos voyages</a>
                <img class="header-jet-icon" src="../image/jet-icon.png" alt="jet-icon">
            </div>

            <?php
            if(isset($_SESSION['mail'])){

                ?>
                <a href="../php/deconnexion.php" class="header-link">
                    <div class="header-connect">Se déconnecter</div>
                </a>
                <?php
            }else{


                ?>
                <a href="../php_pages/connexion.html" class="header-link">
                    <div class="header-connect">Se connecter</div>
                </a>
                <?php
            }
            ?>

            <a href="../php_pages/user.php" class="header-link"><img class="header-user-logo"
                                                                  src="../image/user-icone.png"
                                                                  alt="utilisateur-logo"></a>

        </div>
    </div>
</header>


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