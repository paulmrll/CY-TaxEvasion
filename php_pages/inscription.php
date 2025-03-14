<?php
    session_destroy();
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>S'inscrire</title>
    <link rel="icon" type="image" href="../image/logo-site.webp">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/connexion.css">


    <meta charset="UTF-8">
</head>
<body>

    <?php
    require_once "../php_pages/header.php";
    ?>


<form method="POST" action="../php/inscription.php">
    <table>
        <tr>
            <th colspan="2">Inscription</th>
        </tr>
        <tr>
            <td><input id="firstname" name="firstname" type="text" placeholder="Prénom" required></td>
        </tr>
        <tr>
            <td><input id="name" name="name" type="text" placeholder="Nom" required></td>
        </tr>

        <tr>
            <td><input id="email" name="email" type="email" placeholder="e-mail@gmail.com" required></td>
        </tr>
        <tr>
            <td><input id="password" name="password" type="password" placeholder="Mot de passe" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit">Inscription</button>
                <button type="reset">Réinitialiser</button>
            </td>
        </tr>
        <tr>
            <td colspan="2">Déjà un compte ? <a href="connexion.php">Connectez-vous</a></td>
        </tr>

    </table>
</form>


<?php
require_once "../php_pages/footer.php";
?>


</body>
<script src="exo2.js"></script>
</html>