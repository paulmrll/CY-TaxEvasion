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
            <td colspan="2"><input id="firstname" name="firstname" type="text" placeholder="Prénom" required></td>
        </tr>
        <tr>
            <td colspan="2"><input id="name" name="name" type="text" placeholder="Nom" required></td>
        </tr>

        <tr>
            <td colspan="2"><input id="email" name="email" type="email" placeholder="e-mail@gmail.com" required></td>
        </tr>
        <tr>
            <td colspan="2"><input id="password" name="password" type="password" placeholder="Mot de passe" required></td>
        </tr>
        <tr>
            <td colspan="2"><input id="numero" name="numero" type="number" placeholder="numéro de rue" required></td>
        </tr>
        <tr>
            <td colspan="2"><input id="rue" name="rue" type="text" placeholder="rue" required></td>
        </tr>
        <tr>
            <td colspan="2"><input id="ville" name="ville" type="text" placeholder="ville" required></td>
        </tr>
        <tr>
            <td colspan="2"><input id="code postal" name="cdp" type="text" placeholder="95000" required></td>
        </tr>
        <tr>
            <td><label for="anniversaire" >Anniversaire : </label></td>
            <td><input id="anniversaire" name="birth" type="date" placeholder="anniversaire" required></td>
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