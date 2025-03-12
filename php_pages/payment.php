<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nous contacter</title>
    <link rel="icon" type="image" href="../image/logo-site.webp">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/payment.css">


</head>
<body>


<?php
require_once "../php_pages/header.php";
?>


<main>
    <div class="payment_container">
        <fieldset>
            <legend>Payment</legend>
            <form action="../php/payment.php" method="post">
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
                <button type="submit">Pay</button>
            </form>
    </div>
</main>


<?php
require_once "../php_pages/footer.php";
?>


</body>
</html>