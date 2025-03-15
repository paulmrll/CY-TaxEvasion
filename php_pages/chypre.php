<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Chypre</title>
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
        <h1>Chypre</h1>
        <img class="main-image" src="../image/chypre.jpeg" alt="../image/chypre.jpeg">
    </div>

    <div class="destination-text">
        <p>
        Chypre est l’une des destinations les plus attractives en Europe pour les entrepreneurs et les investisseurs en quête 
        d’optimisation fiscale. Grâce à son taux d’imposition sur les sociétés parmi les plus bas de l’Union européenne, fixé à 12,5 %,
         l’île offre un cadre fiscal avantageux pour les entreprises internationales. De plus, Chypre applique une exonération totale
          sur les plus-values mobilières, ainsi qu’une absence d’impôt sur les dividendes perçus par les sociétés étrangères, ce qui en
           fait un hub stratégique pour la gestion de patrimoine et les investissements.
        </p>
    </div>


    <div class="reservation-option-container">
        <h2>Votre réservation</h2>
        <form method="post" action="../php/register_travel.php">
            <input type="hidden" name="destination" value="chypre">


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
        <img src="../image/les-palaos-maps.png" alt="Palaos-Maps">
        <br>
        <p>Carte Les Palaos</p>
    </div>
</main>

<?php
require_once "../php_pages/footer.php";
?>
</body>

</html>
