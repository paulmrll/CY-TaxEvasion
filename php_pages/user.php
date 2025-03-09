<?php

session_start();

if (!isset($_SESSION['mail'])) {
    header("Location: ../php_pages/connexion.php");
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

<?php
require_once "../php_pages/header.php";
?>

<main>



    <div class="utilisateur">
        <div class="main-grid">
            <div class="compte-info-container">
                <div class="utilisateur-line-container">
                    <div class="box-container">
                        <form action="../php/modification.php" method="post">
                        <div class="part-container">
                            <h1>Mon Compte :</h1>
                            <div class="compte-info-container-top">

                                <div class="grid-line-container">
                                    <div>


                                        <a>Prénom : </a>
                                        <input type="text" value="<?php echo $_SESSION['forename']; ?>" name="forename" required>
                                    </div>

                                </div>

                                <div class="grid-line-container">
                                    <div>
                                        <a>Nom : </a>
                                        <input type="text" name="name" value="<?php echo $_SESSION['name']; ?>" required>
                                    </div>

                                </div>

                                <div class="grid-line-container">
                                    <div>
                                        <a>Adresse mail : </a>
                                        <input type="text" name="mail" value="<?php echo $_SESSION['mail']; ?>" required>
                                    </div>

                                </div>

                                <div class="grid-line-container">
                                    <div>
                                        <a>Mot de passe : </a>
                                        <input type="text" name="mdp" value="<?php echo $_SESSION['mdp']; ?>" required>
                                    </div>
                                </div>
                                <div class="button-container">
                                    <button class="button-modifier">Modifier</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    </form>
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

