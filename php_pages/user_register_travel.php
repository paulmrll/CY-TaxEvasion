
<?php
require_once "../php/fonctions_utiles.php";


if (!isset($_SESSION['email'])) {
    header("Location: ../php_pages/connexion.php");
    exit();
}
if (isset($_GET["destination"])){
    $destination = $_GET["destination"];
    $destination = strtolower($destination);
    $destination[0] = strtoupper($destination[0]);
    $jsonFile = "../data/travel.json";
    $content = json_decode(file_get_contents($jsonFile), true);
    if ($content == null){
        header('Location: ../php_pages/add_new_travel.php');
        exit();
    }
    $a = 0;
    $i = -1;
    for ($t = 0; $t < count($content); $t++){
        if ($content[$t]['destination'] === $destination){
            $a = 1;
            $i = $t;
            break;
        }
    }
    if ($a === 0){
        header('Location: ../php_pages/add_travel.php');
        exit();
    }
} else {
    header("Location: user.php");
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


   

    <img class="main-image" src="<?php echo $content[$i]["image"]?>" alt="Image de la destination">
    <h1>Réserver votre voyage à <?php echo $content[$i]["destination"]?></h1>
    <div class="container">
    <form id="form1" method="post" action="../php/register_travel.php">
       
            <input id="destination" type="hidden" value="<?php echo $content[$i]["destination"]?>" name="destination">

            <div class="reservation-slider-container">

                <div class="reservation-select">
                    <h5>Hotêl :</h5>
                    <label>
                        <select id="hotel" name="hotel" required>
                        
                            
                        </select>
                    </label>
                </div>


                <div class="reservation-checkbox">
                    <h5>Activités nautiques :</h5>
                    <div id="loisir_div">
                    
                    </div>
                </div>


                <div class="reservation-checkbox">
                    <h5>Visite guidée :</h5>
                    <div id="visite_div">
                    
                    </div>
                </div>


                <div class="reservation-checkbox">
                    <h5>Activité de détentes :</h5>
                    <div id="relaxation_div">
                    
                    </div>
                </div>
                <div class="reservation-checkbox">
                    <h5>Nombre de personnes</h5>
                    <input id="person" name="person" type="number" min="0" placeholder="1" required>
                </div>
                <div class="reservation-checkbox">
                    <h5>Dates de départ :</h5>
                    <input id="departure" name="departure" value="<?php echo date('Y-m-d', strtotime('+3 day')); ?>" type="date" required>
                </div>
                


                <div class="reservation-checkbox">

                    <h5>Dates de retour :</h5>
                    <input id="return" name="return" type="date" placeholder="jj/mm/aaaa" required>

                </div>
                <div class="reservation-prix">
                <h5>Prix :</h5>
                <h6 id="prix_final">0</h6>€
                </div>
                <div class="button-container" id="buttons">
            <input type="hidden" id="prix" name="prix" value="<?php echo $content[$i]["prix"]?>" >

            </div>

            </div>
            <input id="continent" name="continent" type="hidden" value="<?php echo $content[$i]["continent"]?>">
            <div class="button-container" id="buttons">
                <input type="hidden" name="todo" value="register">
                <button type="submit">Réserver</button>

            </div>
        </form>
    </div>
</main>


<?php
require_once "../php_pages/footer.php";
?>

<script src="../js/user_register_travel.js"></script>


</body>
</html>

