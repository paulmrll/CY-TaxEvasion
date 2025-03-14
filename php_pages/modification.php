<?php
require_once "../php/fonctions_utiles.php";


if (!isset($_SESSION['email'])) {
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


    <meta charset="UTF-8">
</head>
<body>

<?php
require_once "../php_pages/header.php";
?>

<main>
    <div class="container">
</main>


<?php
require_once "../php_pages/footer.php";
?>


</body>
</html>

