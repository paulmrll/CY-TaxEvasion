<?php
require_once "../php/fonctions_utiles.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nous contacter</title>
    <link rel="icon" type="image" href="../image/logo-site.webp">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/add_card.css">


</head>
<body>


<?php
require_once "../php_pages/header.php";
?>

<?php
if (file_exists("../data/utilisateurs.json")) {
    if (isset($_SESSION['email'])) {
        $a = find_user();
            $content = json_decode(file_get_contents("../data/utilisateurs.json"), true);
            if ($content === null){
                header('Location: ../php_pages/inscription.php');
                exit();
            }
            if ($content[$a]['card']['number'] != 0 && $content[$a]['card']['date'] != 0 && $content[$a]['card']['date'] != 0){
                header('Location: ../php_pages/paiement.php');
            }
    }
} else {
    header('Location: ../php_pages/inscription.php');
    exit();
}
?>

<main>
    <div class="payment_container">
        <fieldset>
            <legend>Payment</legend>
            <form action="../php/add_card.php" method="post">
            <div class="payment_form_case">
                    <label for="name">Card number:</label>
                    <input type="text" id="name" name="name" placeholder="Jean Michel"required>
                </div>
                <div class="payment_form_case">
                    <label for="card">Card number:</label>
                    <input type="text" id="card" minlength="7" name="card" placeholder="4973 5595 9089 7878"required>
                </div>
                <div class="payment_form_case">
                    <label for="date">Expiration date:</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div class="payment_form_case">
                    <label type="text"  for="cvv">CVV:</label>
                    <input minlength="2" type="text" id="cvv" name="cvv" placeholder="789" required>
                </div>
                <button type="submit">Save</button>
            </form>
    </div>
</main>


<?php
require_once "../php_pages/footer.php";
?>


</body>
</html>