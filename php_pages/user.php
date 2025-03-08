<?php

session_start();

if (!isset($_SESSION['mail'])) {
    header("Location: ../php_pages/connexion.html");
    exit();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Utilisateur</title>
    <link rel="icon" type="image" href="../image/logo-site.webp">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <meta charset="UTF-8">
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


            <a href="../php_pages/connexion.html" class="header-link">
                <div class="header-connect">Se connecter</div>
            </a>

            <a href="../php_pages/user.php" class="header-link-active"><img class="header-user-logo"
                                                                       src="../image/user-icone.png"
                                                                       alt="utilisateur-logo"></a>
        </div>
    </div>
</header>


<main>

    <a href="../php/deconnexion.php">Se déconnecter</a>


    <div class="utilisateur">
        <div class="main-grid">
            <div class="compte-info-container">
                <div class="utilisateur-line-container">
                    <div class="box-container">
                        <div class="part-container">
                            <h1>Mon Compte :</h1>
                            <div class="compte-info-container-top">

                                <div class="grid-line-container">
                                    <div>


                                        <a>Prénom : </a>
                                        <a><?php echo htmlspecialchars($_SESSION['forename']); ?></a>
                                    </div>
                                    <button class="prenom"><img src="../image/modifier.png" alt="modifier"></button>
                                </div>

                                <div class="grid-line-container">
                                    <div>
                                        <a>Nom : </a>
                                        <a><?php echo htmlspecialchars($_SESSION['name']); ?></a>
                                    </div>
                                    <button class="nom"><img src="../image/modifier.png" alt="modifier"></button>
                                </div>

                                <div class="grid-line-container">
                                    <div>
                                        <a>Adresse mail : </a>
                                        <a><?php echo htmlspecialchars($_SESSION['mail']); ?></a>
                                    </div>
                                    <button class="mail"><img src="../image/modifier.png" alt="modifier"></button>
                                </div>

                                <div class="grid-line-container">
                                    <div>
                                        <a>Mot de passe : </a>
                                        <a><?php echo htmlspecialchars($_SESSION['mdp']); ?></a>

                                    </div>
                                    <button class="mdp"><img src="../image/modifier.png" alt="modifier"></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="utilisateur-image">
                        <button>
                            <img src="../image/user-icone.png" alt="image-utilisateur">
                        </button>
                    </div>
                </div>


                <div class="box-container">
                    <div class="part-container">
                        <h1>Mes Voyages :</h1>
                        <div class="compte-info-container">
                            <div class="grid-container">

                                <div class="line-container">
                                    <div class="grid-item">
                                        <a href="../php_pages/anguilla.php" class="image-select">
                                            <img src="../image/anguilla.jpg" alt="anguilla">
                                            <h3>Anguilla</h3>
                                        </a>
                                    </div>

                                    <p class="Réservé">Reservé</p>

                                    <div class="date-container">
                                        <p>Date de départ : <strong>00/00/0000</strong></p>
                                        <p>Date de retour : <strong>00/00/0000</strong></p>
                                    </div>
                                </div>

                                <div class="line-container">
                                    <div class="grid-item">
                                        <a href="../php_pages/panama.php" class="image-select">
                                            <img src="../image/le-panama.jpg" alt="le-panama">
                                            <h3>Le Panama</h3>
                                        </a>
                                    </div>
                                    <p class="Payment">En Attente de Payment : 150 000$</p>
                                    <div class="button-payer">
                                        <button>Payer</button>
                                    </div>
                                </div>

                                <div class="line-container">
                                    <div class="grid-item">
                                        <a href="../php_pages/fidji.php" class="image-select">
                                            <img src="../image/les-fidji.jpeg" alt="les_fidji">
                                            <h3>Les Fidji</h3>
                                        </a>
                                    </div>
                                    <p class="Annulé">Annulé</p>
                                </div>

                                <div class="line-container">
                                    <div class="grid-item">
                                        <a href="../php_pages/les-palaos.php" class="image-select">
                                            <img src="../image/les-palaos.jpg" alt="les-palaos">
                                            <h3>Les Palaos</h3>
                                        </a>
                                    </div>
                                    <p class="Effectué">Effectué</p>
                                </div>


                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

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

