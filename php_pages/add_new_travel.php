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
    

   

   
    <h1>Ajouter une Destination à votre catalogue</h1>
    <div class="container">
    <form method="post" action="../php/add_new_travel.php" enctype="multipart/form-data">
       

        
            <div class="reservation-slider-container">
            <div class="reservation-checkbox">
                <h5>Nom du voyage : </h5>
                <input id="destination" type="text" name="destination" placeholder="Destination" required>
                    
            </div>
            <div class="reservation-checkbox">
                    <h5>hotel :</h5>
                    <div>
                    <input type="checkbox" id="hotel1" name="hotel[]" value="5 étoiles">
                    <label class="reservation-button" for="hotel1">5 étoiles</label>
                    <input type="checkbox" id="hotel2" name="hotel[]" value="5 étoiles Premium">
                    <label class="reservation-button" for="hotel2"> 5 étoiles Premium</label>
                    <input type="checkbox" id="hotel3" name="hotel[]" value="5 étoiles Premium VIP">
                    <label class="reservation-button" for="hotel3">5 étoiles Premium VIP</label>
                    <input type="checkbox" id="hotel4" name="hotel[]" value="5 étoiles Premium VIP Deluxe">
                    <label class="reservation-button" for="hotel4">5 étoiles Premium VIP Deluxe</label>
                    

                    </div>
                </div>


                <div class="reservation-checkbox">
                    <h5>Activités nautiques :</h5>
                    <div>
                    <input type="checkbox" id="loisir1" name="loisir[]" value="Jet-Ski">
                    <label class="reservation-button" for="loisir1">Jet-Ski</label>
                    <input type="checkbox" id="loisir2" name="loisir[]" value="Plongée sous-marine">
                    <label class="reservation-button" for="loisir2">Plongée sous-marine</label>
                    <input type="checkbox" id="loisir3" name="loisir[]" value="Balade en yacht">
                    <label class="reservation-button" for="loisir3">Balade en yacht</label>
                    

                    </div>
                </div>


                <div class="reservation-checkbox">
                    <h5>Visite guidée :</h5>
                    <div>
                    <input type="checkbox" id="visite1" name="visite[]" value="Visite de Banque">
                    <label class="reservation-button" for="visite1">Visite de Banque</label>
                    <input type="checkbox" id="visite2" name="visite[]" value="Visite d'un Musée Colonialiste">
                    <label class="reservation-button" for="visite2">Visite d'un Musée Colonialiste</label>
                    <input type="checkbox" id="visite3" name="visite[]" value="Visite d'un vignoble'">
                    <label class="reservation-button" for="visite3">Visite d'un vignoble</label>
                    </div>
                    
                </div>


                <div class="reservation-checkbox">
                    <h5>Activité de détentes :</h5>
                    <div>
                    <input type="checkbox" id="relaxation1" name="relaxation[]" value="Spa et Jacuzzi Privé">
                    <label class="reservation-button" for="relaxation1">Spa et Jacuzzi Privé</label>
                    <input type="checkbox" id="relaxation2" name="relaxation[]" value="Diner gastronomique 5 étoiles">
                    <label class="reservation-button" for="relaxation2">Diner gastronomique 5 étoiles</label>
                    <input type="checkbox" id="relaxation3" name="relaxation[]" value="Soiree VIP éxecutif business class">
                    <label class="reservation-button" for="relaxation3">Soiree VIP éxecutif business class</label>
                    </div>
                </div>
                <div>

                <label for="photo">Choisissez une photo :</label>
                <input type="file" id="photo" name="photo" accept="image/*" required>
                <label for="photodrapeau">Choisissez une photo du drapeau :</label>
                <input type="file" id="photodrapeau" name="photo_drapeau" accept="image/*" required>
                <label for="photocarte">Choisissez une photo de la carte de la destination :</label>
                <input type="file" id="photocarte" name="photo_carte" accept="image/*" required>
                <div class="reservation-checkbox">
                    <h5>Description du Voyage :</h5>
                    <div>
                    <textarea id="message" name="description" rows="6" cols="70" required></textarea>
                    </div>
                </div>
                <div class="reservation-checkbox">
                    <h5>Prix : </h5>
                    <input id="Prix" type="text" name="prix" placeholder="Prix" required>
                </div>
                <div class="reservation-checkbox">
                    <h5>Continent : </h5>
                    <input id="Continent" type="text" name="continent" placeholder="Continent" required>
                </div>
                
                
            </div>
            <div class="button-container" id="buttons">
                <button type="submit">Enregistrer</button>
            </div>

</form>

                </div>
               
            

        

    </div>
</main>


<?php
require_once "../php_pages/footer.php";
?>

<script src="../js/add_new_travel.js"></script>

</body>
</html>

