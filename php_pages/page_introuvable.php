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
    <link rel="stylesheet" href="../css/contact.css">


</head>
<body>


<?php
require_once "../php_pages/header.php";
?>



  <main>



    <div class="contact-div">
        <h1>Nous contacter</h1>
        <div class="information">
            <img alt="mail" src="../image/mail.png">
            <a href="mailto:cy.taxevasion@gmail.fr">cy.taxevasion@gmail.fr</a>
            <img alt="tel" src="../image/tel.png">
            <a href="tel:+337101010">+337101010</a>
            <img alt="instagram" src="../image/instagram-logo.png">
            <a href="https://www.instagram.com/" target="_blank">Click Here</a>
        </div>
    </div>




  </main>


  <?php
require_once "../php_pages/footer.php";
?>



</body>
</html>