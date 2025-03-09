<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Les-Samoa-Americaine</title>
    <link rel="icon" type="image" href="../image/logo-site.webp">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/destination-description.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>


<?php
require_once "../php_pages/header.php";
?>


<main>


    <div class="title-container">
        <h1>LES SAMOA-AMERICAINES</h1>
        <img class="main-image" src="../image/les-samoa-americaine.jpeg" alt="../image/les-samoa-americaine.jpg">
    </div>


    <div class="destination-text">
        <p>
            Les Samoa-Américaines, territoire non incorporé des États-Unis dans le Pacifique Sud, se distinguent par
            leur autonomie fiscale et leurs paysages paradisiaques. Leur code fiscal indépendant permet une fiscalité
            plus avantageuse que celle des États-Unis, avec des taux réduits et des exonérations pour les entreprises.
            L’archipel offre des opportunités économiques variées dans le tourisme, la pêche et l’industrie
            agroalimentaire. Grâce à ses incitations fiscales et ses zones franches, il constitue un choix stratégique
            pour les investisseurs cherchant à allier rentabilité et cadre de vie exceptionnel.
        </p>
    </div>


    <div class="reservation-option-container">
        <h2>Votre réservation</h2>
        <form method="post" action="../php_pages/samoa-americaine.php">
            <div class="reservation-slider-container">

                <div class="reservation-select">
                    <h5>Hotêl :</h5>
                    <label>
                        <select id="hotel" name="hotel" required>
                            <option value="" selected hidden>Choisissez une option</option>
                            <option value="5 étoiles">5 étoiles</option>
                            <option value="5 étoiles premium">5 étoiles premium</option>
                            <option value="5 étoiles Premium VIP">5 étoiles Premium VIP</option>
                            <option value="5 étoiles Premium VIP Deluxe">5 étoiles Premium VIP Deluxe</option>
                        </select>
                    </label>
                </div>


                <div class="reservation-checkbox">
                    <h5>Activités nautiques :</h5>
                    <div>
                        <input type="checkbox" id="loisir1" name="loisir" value="visite de Banque">
                        <label class="reservation-button" for="loisir1">Nage avec les requins</label>

                        <input type="checkbox" id="loisir2" name="loisir" value="Jet-Ski">
                        <label class="reservation-button" for="loisir2">Balade à Jet-Ski</label>

                        <input type="checkbox" id="loisir3" name="loisir" value="Plongé sous-marine">
                        <label class="reservation-button" for="loisir3">Plongé Sous-Marine</label>

                        <input type="checkbox" id="loisir4" name="loisir" value="Balade en yacht">
                        <label class="reservation-button" for="loisir4">Balade en Yacht</label>
                    </div>
                </div>


                <div class="reservation-checkbox">
                    <h5>Visite guidée :</h5>
                    <div>
                        <input type="checkbox" id="visite1" name="visite" value="visite de Banque">
                        <label class="reservation-button" for="visite1">Visite de la Banque Centrale</label>

                        <input type="checkbox" id="visite2" name="visite" value="Visite d'un Musée Colonialiste">
                        <label class="reservation-button" for="visite2">Visite d'un Musée Colonialiste</label>

                        <input type="checkbox" id="visite3" name="visite" value="Visite d'un vignoble">
                        <label class="reservation-button" for="visite3">Visite d'un vignoble</label>
                    </div>
                </div>


                <div class="reservation-checkbox">
                    <h5>Activité de détentes :</h5>
                    <div>
                        <input type="checkbox" id="détente1" name="détente" value="Spa et Jacuzzi Privée">
                        <label class="reservation-button" for="détente1">Spa et Jacuzzi Privée</label>

                        <input type="checkbox" id="détente2" name="détente" value="Dîner gastronomique 5 étoiles">
                        <label class="reservation-button" for="détente2">Dîner gastronomique 5 étoiles</label>

                        <input type="checkbox" id="détente3" name="détente"
                               value="Soirée VIP exécutif business  class">
                        <label class="reservation-button" for="détente3">Soirée VIP exécutif business class</label>
                    </div>
                </div>

                <div class="reservation-checkbox">
                    <h5>Repas :</h5>
                    <div>
                        <input type="radio" id="repas1" name="repas" value="Spa et Jacuzzi Privée" required>
                        <label class="reservation-button" for="repas1">Matin</label>

                        <input type="radio" id="repas2" name="repas" value="Spa et Jacuzzi Privée">
                        <label class="reservation-button" for="repas2">Soir</label>

                        <input type="radio" id="repas3" name="repas" value="Dîner gastronomique 5 étoiles">
                        <label class="reservation-button" for="repas3">Midi-Soir</label>

                        <input type="radio" id="repas4" name="repas"
                               value="Soirée VIP exécutif business  class">
                        <label class="reservation-button" for="repas4">Matin-Midi-Soir</label>
                    </div>
                </div>

                <div class="reservation-date">
                    <h5>Dates de départ :</h5>
                    <input id="date-départ" name="date-départ" type="date" placeholder="jj/mm/aaaa" required></td>

                </div>


                <div class="reservation-date">

                    <h5>Dates de retour :</h5>
                    <input id="date-retour" name="date-retour" type="date" placeholder="jj/mm/aaaa" required></td>

                </div>

                <div class="reservation-prix">
                    <h5>Prix :</h5><h6>Beaucoup Trop Cher</h6>
                </div>


            </div>
            <div class="button-container" id="buttons">
                <button type="submit">Réserver</button>
                <button type="reset">Reset</button>
            </div>
        </form>
    </div>


    <div class="maps">
        <img src="../image/samoa-americaine-maps.png" alt="Samoa-Americaine-maps">
        <br>
        <p>Carte Samoa-américaine</p>
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