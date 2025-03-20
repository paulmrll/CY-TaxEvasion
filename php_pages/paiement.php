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



    <meta charset="UTF-8">
</head>
<body>

<?php
require_once "../php_pages/header.php";
?>

<main>
    <h1>Récapitulatif de la commande</h1>
    <p>Montant total : 18000.99 €</p>
    <p>Numéro de transaction : 154632ABCD</p>
    <p>Vendeur : CY TAXEVASION SARL</p>
<form action='https://www.plateforme-smc.fr/cybank/index.php' method='POST'>
    <input type='hidden' name='transaction' value='154632ABCD'>
    <input type='hidden' name='montant' value='18000.99'>
    <input type='hidden' name='vendeur' value='MI3_A'>
    <input type='hidden' name='retour' value='http://localhost/retour_paiement.php?session=s'>
    <input type='hidden' name='control' value='01c06955b2d4ad0ccdedd4aad0ab68bf'>
    <input type='submit' value="Valider et payer">
</form>

</main>


<?php
require_once "../php_pages/footer.php";
?>


</body>
</html>

