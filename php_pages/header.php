<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nous contacter</title>
    <link rel="icon" type="image" href="../image/logo-site.webp">
    <link rel="stylesheet" href="../css/styles.css">
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
            if(isset($_SESSION['email'])){

                ?>
                <a href="../php/deconnexion.php" class="header-link">
                    <div class="header-connect">Se déconnecter</div>
                </a>
                <?php
            }else{
                ?>
                <a href="../php_pages/connexion.php" class="header-link">
                    <div class="header-connect">Se connecter</div>
                </a>
                <?php
            }
            ?>

            <a href="../php_pages/user.php" class="header-link"><img class="header-user-logo"
                                                                  src="../image/user-icone.png"
                                                                  alt="user-logo"></a>

            <?php
            if(isset($_SESSION['email'])) {
                if($_SESSION['role'] == 'Admin'){
                    ?>
                    <a href="../php_pages/admin.php" class="header-link"><img class="header-user-logo"
                                                                             src="../image/admin-logo.png"
                                                                             alt="admin-logo"></a>

            <?php
                }
            }
            ?>


        </div>
    </div>
</header>