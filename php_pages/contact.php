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
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
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


  <footer>
    <div class="footer-container">
      <div class="contact" >
        <a href="../php_pages/contact.php" class="footer-contact">Nous contacter</a>
        <a href="about-us.php" class="footer-contact">Qui sommes-nous ?</a>
      </div>
      <div class="socials">
        <div>Nos réseaux : </div>
        <a class="twitter-logo" href="https://x.com/?mx=2" target="_blank"><img  src="../image/twitter-logo.png" alt="twitter-logo"></a>
        <a class="instagram-logo" href="https://www.instagram.com/" target="_blank"><img src="../image/instagram-logo.png" alt="instagram-logo.png"></a>
      </div>
    </div>
  </footer>



</body>
</html>