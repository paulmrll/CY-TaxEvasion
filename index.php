<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>CY-TAXEVASION</title>
    <link rel="icon" type="image" href="image/logo-site.webp">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <meta charset="UTF-8">

</head>


<body>


<header>
    <div class="header-container">

        <div class="header-left">
            <a href="index.php" class="header-link">CY-TAXEVASION </a>
        </div>

        <div class="header-slogan">THE HOLIDAYS YOUR WALLET NEED</div>
        <div class="header-right">
            <div class="header-voir-voyage">
                <a href="php_pages/destination.php" class="header-link header-voir-voyage-text">Voir nos voyages</a>
                <img class="header-jet-icon" src="image/jet-icon.png" alt="jet-icon">
            </div>

            <?php
            if(isset($_SESSION['mail'])){

                ?>
                <a href="php_json/deconnexion.php" class="header-link">
                    <div class="header-connect">Se déconnecter</div>
                </a>
                <?php
            }else{
                ?>
                <a href="php_pages/connexion.php" class="header-link">
                    <div class="header-connect">Se connecter</div>
                </a>
                <?php
            }
            ?>

            <a href="php_pages/user.php" class="header-link"><img class="header-user-logo"
                                                                     src="image/user-icone.png"
                                                                     alt="user-logo"></a>

            <?php
            if(isset($_SESSION['mail'])) {
                if($_SESSION['role'] == 'Admin'){
                    ?>
                    <a href="php_pages/admin.php" class="header-link"><img class="header-user-logo"
                                                                              src="image/admin-logo.png"
                                                                              alt="admin-logo"></a>

                    <?php
                }
            }
            ?>


        </div>
    </div>
</header>


<main>

    <div class="video-background">
        <video width="560" height="315" autoplay loop muted>
            <source src="videos/Tax-Evasion-Trailer.mp4" type="video/mp4">
            Votre navigateur ne supporte pas la lecture de vidéos.
        </video>
    </div>


    <div class="search-bar-container">
        <label class="search-bar">
            <a class="search-bar-title">Recherchez votre destination de rêve</a>
            <input type="text" list="destination">
            <datalist id="destination">
                <option value="Les Samoa-Américaines"></option>
                <option value="Anguilla"></option>
                <option value="Les Fidji"></option>
                <option value="Les Palaos"></option>
                <option value="Le Panama"></option>
            </datalist>
        </label>
    </div>


    <div class="map-container">
        <h1>Des Destinations Partout dans le Monde</h1>
        <div class="ping-container">
            <img class="map-image" src="image/map.jpg" alt="map">

            <a href="php_pages/samoa-americaine-description.php" class="ping" style="top: 57%; left: 15.2%">
                <div class="ping-text">Les Samoa-Américaines</div>
            </a>

            <a href="php_pages/anguilla.php" class="ping" style="top:36.5%; left: 30.5%;">
                <div class="ping-text">Anguilla</div>
            </a>

            <a href="php_pages/antigua-barbuda.php" class="ping" style="top:39.5%; left: 31.5%;">
                <div class="ping-text">Antigua-et-Barbuda</div>
            </a>

            <a href="php_pages/fidji.php" class="ping" style="top: 60%; left: 93.5%;">
                <div class="ping-text">Les Fidji</div>
            </a>

            <a href="php_pages/les-palaos.php" class="ping" style="top: 45.5%; left: 86%;">
                <div class="ping-text">Le Palaos</div>
            </a>

            <a href="php_pages/panama.php" class="ping" style="top:43.8%; left: 27.2%;">
                <div class="ping-text">Le Panama</div>
            </a>
        </div>
    </div>


    <div class="carousel-container">
        <div class="carousel-title"> 🌴Découvrez nos voyages les plus populaires🌴</div>
        <div class="carousel-content">
            <div class="grid-container">

                <div class="grid-item">
                    <a href="php_pages/anguilla.php" class="image-select">
                        <img src="image/anguilla.jpg" alt="anguilla">
                        <h3>Anguilla</h3>
                        <div class="flag">
                            <img src="image/anguilla-flag.jpg" alt="anguilla-flag">
                        </div>
                    </a>
                </div>

                <div class="grid-item">
                    <a href="php_pages/fidji.php" class="image-select">
                        <img src="image/les-fidji.jpeg" alt="les_fidji">
                        <h3>Les Fidji</h3>
                        <div class="flag">
                            <img src="image/les-fidji-flag.jpg" alt="les-fidji-flag">
                        </div>
                    </a>
                </div>
                <div class="grid-item">
                    <a href="php_pages/les-palaos.php" class="image-select">
                        <img src="image/les-palaos.jpg" alt="les-palaos">
                        <h3>Les Palaos</h3>
                        <div class="flag">
                            <img src="image/les-palaos-flag.jpg" alt="les-palaos">
                        </div>
                    </a>
                </div>
                <div class="grid-item">
                    <a href="php_pages/panama.php" class="image-select">
                        <img src="image/le-panama.jpg" alt="le-panama">
                        <h3>Le Panama</h3>
                        <div class="flag">
                            <img src="image/le-panama-flag.jpg" alt="le-panama-flag">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="trading-container">
        <div class="trading-content">
            <div class="trading-items">
                <img class="trading-image" src="image/not-stonks-graph.png" alt="trading-graph.jpg">
                <div class="trading-text">Vous en avez marre que l'<a href="https://www.urssaf.fr/accueil.php"
                                                                      target="_blank">URSAF</a> vous prennent tout?
                </div>
            </div>
            <div class="trading-items">
                <img class="trading-image" src="image/stonks-graph.png" alt="trading-graph.jpg">
                <div class="trading-text">Alors n'hésitez plus et sautez le pas avec Cy-TAXEVASION</div>
            </div>
        </div>
    </div>

    <div class="texte">
        <p>
            Pourquoi payer plus quand vous pouvez voyager mieux ? Avec CY-TAXEVASION, découvrez les destinations les
            plus exclusives alliant luxe, discrétion et optimisation fiscale. Des plages paradisiaques des Caraïbes aux
            îles du Pacifique, profitez d’un séjour sur-mesure où soleil et avantages fiscaux vont de pair.
        </p>
        <p>
            Voyagez en toute sérénité avec nos experts qui s’occupent de tout : hébergements haut de gamme, conseils sur
            les juridictions avantageuses et services VIP.
        </p>
        <p>
            Ne laissez pas votre fortune dormir, faites-la voyager avec vous !
        </p>
    </div>


</main>


<footer>
    <div class="footer-container">
        <div class="contact">
            <a href="php_pages/contact.php" class="footer-contact">Nous contacter</a>
            <a href="php_pages/about-us.php" class="footer-contact">Qui sommes-nous ?</a>
        </div>
        <div class="socials">
            <div>Nos réseaux :</div>
            <a class="twitter-logo" href="https://x.com/?mx=2" target="_blank"><img src="image/twitter-logo.png"
                                                                                    alt="twitter-logo"></a>
            <a class="instagram-logo" href="https://www.instagram.com/" target="_blank"><img
                        src="image/instagram-logo.png" alt="instagram-logo.png"></a>
        </div>
    </div>
</footer>
</body>

</html>