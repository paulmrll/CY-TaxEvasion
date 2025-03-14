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
    <link rel="stylesheet" href="../css/modification.css">


    <meta charset="UTF-8">
</head>
<body>

<?php
require_once "../php_pages/header.php";
?>

<main>
    <?php if (isset($_SESSION['index-travel'])){
            if (file_exists("../data/utilisateurs.json")) {
                $content = json_decode(file_get_contents("../data/utilisateurs.json"), true);
                if ($content === null){
                    header('Location: ../php_pages/inscription.php');
                    exit();
                }
                $a = find_user();
                if ($_SESSION['index-travel'] >= count($content[$a]['travels'])){
                    header('Location: ../php_pages/inscription.php');
                    exit();
                }
            switch ($content[$a]['travels'][$_SESSION['index-travel']]['destination']){
                case "Anguilla":
                    $name = "Anguilla";
                    $url =  "../php_pages/anguilla.php";
                    $url_image = "../image/anguilla.jpg";
                    break;
                case "Panama":
                    $name = "Le Panama";
                    $url = "../php_pages/panama.php";
                    $url_image = "../image/le-panama.jpg";
                    break;
                case "Fidji":
                    $name = "Les Fidji";
                    $url = "../php_pages/fidji.php";
                    $url_image = "../image/les-fidji.jpeg"; 
                    break;
                case "Palaos":
                    $name = "Les Palaos";
                    $url = "../php_pages/les-palaos.php";
                    $url_image = "../image/les-palaos.jpg";
                    break;
                case "Antigua":
                    $name = "Antigua";
                    $url =  "../php_pages/antigua-barbuda.php";
                    $url_image = "../image/antigua-et-barbuda.jpg";
                    break;
                case "Samoa":
                    $name = "Samoa";
                    $url =  "../php_pages/samoa-americaine.php";
                    $url_image = "../image/les-samoa-americaine.jpeg";
                    break;
                default:
                    $name = "Destination inconnue";
                    $url =  "../php_pages/inscription.php";
                    $url_image = "../image/destination-inconnue.jpg";
                    break;
            }
        }
    }
    ?>

   

    <img src="<?php echo $url_image?>" alt="Image de la destination">
    <h1>Modifier votre voyage</h1>
    <div class="container">
    <form method="post" action="../php/modification_travel.php">
        <input type="hidden" name="destination" value="<?php echo $content[$a]['travels'][$_SESSION['index-travel']]['destination']?>">


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
                        <input type="checkbox" id="loisir1" name="loisir[]" value="visite de Banque">
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
                        <input type="checkbox" id="visite1" name="visite[]" value="visite de Banque">
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
                    <input id="departure" name="departure" type="date" placeholder="jj/mm/aaaa" required>

                </div>


                <div class="reservation-checkbox">

                    <h5>Dates de retour :</h5>
                    <input id="return" name="return" type="date" placeholder="jj/mm/aaaa" required>

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
</main>


<?php
require_once "../php_pages/footer.php";
?>


</body>
</html>

