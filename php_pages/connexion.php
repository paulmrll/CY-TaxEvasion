<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Se Connecter</title>
    <link rel="icon" type="image" href="../image/logo-site.webp">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/connexion.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <meta charset="UTF-8">
</head>
<body>


    <?php
    require_once "../php_pages/header.php";
    ?>

<main>


    <form method="POST" action="../php/connexion.php">
        <table>
            <tr>
                <th>Connexion</th>
            </tr>
            <tr>
                <td><input id="mail" name="mail" type="email" placeholder="nom.prenom@gmail.com" required></td>
            </tr>
            <tr>
                <td><input id="password" name="mdp" type="password" placeholder="mot de passe" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">connexion</button>
                    <button type="reset">Réinitialiser</button>
                </td>
            </tr>
            <tr>
                <td colspan="2">Pas de compte ? <a href="inscription.php">Inscrivez-vous</a></td>
            </tr>
            <tr>
                <td colspan="2"><a href="admin.php">Se connecter en tant qu'administateur</a></td>
            </tr>
        </table>
    </form>

</main>

<footer>
    <div class="footer-container">
        <div class="contact">
            <a href="../php_pages/contact.php" class="footer-contact">Nous contacter</a>
            <a href="about-us.php" class="footer-contact">Qui sommes-nous ?</a>
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