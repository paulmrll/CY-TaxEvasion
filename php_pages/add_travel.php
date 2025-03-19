<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Monaco</title>
    <link rel="icon" type="image" href="../image/logo-site.webp">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/destination-description.css">


</head>

<body>

<?php
require_once "../php_pages/header.php";
?>


<main>
    <div class="reservation-option-container">
        <h2>Votre réservation</h2>
        <form method="post" action="../php/add_new_travel.php">
            <input type="text" name="destination" placeholder="destination">
            <div class="reservation-slider-container">

                
                <div class="reservation-checkbox">
                    <h5>Activités nautiques :</h5>
                    <div>
                        <input type="checkbox" id="hotel1" name="hotel[]" value="5 etoiles">
                        <label class="reservation-button" for="hotel1">5 etoiles premium</label>

                        <input type="checkbox" id="hotel2" name="hotel[]" value="5 etoiles premium">
                        <label class="reservation-button" for="hotel2">5 etoiles premium</label>

                        <input type="checkbox" id="hotel3" name="hotel[]" value="5 etoiles Premium VIP">
                        <label class="reservation-button" for="hotel3">5 etoiles Premium VIP</label>

                        <input type="checkbox" id="hotel4" name="hotel[]" value="5 etoiles Premium VIP Deluxe">
                        <label class="reservation-button" for="hotel4">5 etoiles Premium VIP Deluxe</label>
                    </div>
                </div>


                <div class="reservation-checkbox">
                    <h5>Activités nautiques :</h5>
                    <div>
                        <input type="checkbox" id="loisir1" name="loisir[]" value="Visite de Banque">
                        <label class="reservation-button" for="loisir1">Nage avec les requins</label>

                        <input type="checkbox" id="loisir2" name="loisir[]" value="Jet-Ski">
                        <label class="reservation-button" for="loisir2">Balade à Jet-Ski</label>

                        <input type="checkbox" id="loisir3" name="loisir[]" value="Plonge sous-marine">
                        <label class="reservation-button" for="loisir3">Plongé Sous-Marine</label>

                        <input type="checkbox" id="loisir4" name="loisir[]" value="Balade en yacht">
                        <label class="reservation-button" for="loisir4">Balade en Yacht</label>
                    </div>
                </div>


                <div class="reservation-checkbox">
                    <h5>Visite guidée :</h5>
                    <div>
                        <input type="checkbox" id="visite1" name="visite[]" value="Visite de Banque">
                        <label class="reservation-button" for="visite1">Visite de la Banque Centrale</label>

                        <input type="checkbox" id="visite2" name="visite[]" value="Visite d'un Musee Colonialiste">
                        <label class="reservation-button" for="visite2">Visite d'un Musée Colonialiste</label>

                        <input type="checkbox" id="visite3" name="visite[]" value="Visite d'un vignoble">
                        <label class="reservation-button" for="visite3">Visite d'un vignoble</label>
                    </div>
                </div>


                <div class="reservation-checkbox">
                    <h5>Activité de détentes :</h5>
                    <div>
                        <input type="checkbox" id="détente1" name="relaxation[]" value="Spa et Jacuzzi Prive">
                        <label class="reservation-button" for="détente1">Spa et Jacuzzi Privée</label>

                        <input type="checkbox" id="détente2" name="relaxation[]" value="Diner gastronomique 5 etoiles">
                        <label class="reservation-button" for="détente2">Dîner gastronomique 5 étoiles</label>

                        <input type="checkbox" id="détente3" name="relaxation[]"
                               value="Soiree VIP executif business class">
                        <label class="reservation-button" for="détente3">Soir VIP exécutif business class</label>
                    </div>
                </div>


                

            </div>
            <div class="button-container" id="buttons">
                <button type="submit">Ajouter</button>
                <button type="reset">Reset</button>
            </div>
        </form>
    </div>

    
</main>

<?php
require_once "../php_pages/footer.php";
?>
</body>

</html>
