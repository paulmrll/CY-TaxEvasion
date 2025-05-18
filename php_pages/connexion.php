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
                <td><input id="email" name="email" type="email" placeholder="nom.prenom@gmail.com" required></td>
            </tr>
            <tr>
                <td><input id="password" name="password" type="password" placeholder="mot de passe" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Connexion</button>
                    <button type="reset">Réinitialiser</button>
                </td>
            </tr>
            <tr>
                <td colspan="2">Pas de compte ? <a href="inscription.php">Inscrivez-vous</a></td>
            </tr>

        </table>
    </form>
    

</main>
<?php
require_once "../php_pages/footer.php";
?>
<script src="../js/connexion.js"></script>
</body>
</html>