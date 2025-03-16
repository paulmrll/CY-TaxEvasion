<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Émirats arabes unis</title>
    <link rel="icon" type="image" href="../image/logo-site.webp">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/destination-description.css">


</head>

<body>

<?php
require_once "../php_pages/header.php";
?>


<main>
    <div class="title-container">
        <h1> Émirats arabes unis</h1>
        <img class="main-image" src="../image/EAU.jpg" alt="../image/EAU.jpeg">
    </div>

    <div class="destination-text">
        <p>
        Les Émirats arabes unis (EAU) sont l’un des paradis fiscaux les plus attractifs au monde, offrant un environnement fiscal ultra-compétitif
         et une stabilité économique exceptionnelle. Longtemps connus pour leur absence totale d’impôt sur le revenu des particuliers et des 
         sociétés, les EAU maintiennent un taux d’imposition de 0 % pour la plupart des entreprises établies dans les zones franches, ainsi qu’une
          absence de taxe sur les dividendes, les plus-values et la fortune. Depuis 2023, un impôt sur les sociétés de 9 % a été introduit, mais
           il reste l’un des plus bas au monde et ne s’applique pas aux entreprises dont les bénéfices sont inférieurs à un certain seuil.
        </p>
    </div>


    <div class="reservation-option-container">
        <h2>Votre réservation</h2>
        <form method="post" action="../php/register_travel.php">
            <input type="hidden" name="destination" value="eau">


            <div class="reservation-slider-container">

                <div class="reservation-select">
                    <h5>Hotêl :</h5>
                    <label>
                        <select id="hotel" name="hotel" required>
                            <option value="" selected hidden>Choisissez une option</option>
                            <option value="5 etoiles">5 étoiles</option>
                            <option value="5 etoiles premium">5 étoiles premium</option>
                            <option value="5 etoiles Premium VIP">5 étoiles Premium VIP</option>
                            <option value="5 etoiles Premium VIP Deluxe">5 étoiles Premium VIP Deluxe</option>
                        </select>
                    </label>
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
                               value="Soiree VIP exécutif business  class">
                        <label class="reservation-button" for="détente3">Soirée VIP exécutif business class</label>
                    </div>
                </div>

                <div class="reservation-checkbox">
                    <h5>Dates de départ :</h5>
                    <input id="departure" name="departure" type="date" placeholder="jj/mm/aaaa" required></td>

                </div>


                <div class="reservation-checkbox">

                    <h5>Dates de retour :</h5>
                    <input id="return" name="return" type="date" placeholder="jj/mm/aaaa" required></td>

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
        <img src="../image/EAU-maps.png" alt="Palaos-Maps">
        <br>
        <p>Carte Des Emirats Arabes Unis</p>
    </div>
</main>

<?php
require_once "../php_pages/footer.php";
?>
</body>

</html>
