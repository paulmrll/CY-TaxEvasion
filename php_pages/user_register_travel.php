
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
<?php
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

<main>


   

    <img src="<?php echo $content[$i]["image"]?>" alt="Image de la destination">
    <h1>Réserver votre voyage à <?php echo $content[$i]["destination"]?></h1>
    <div class="container">
    <form method="post" action="../php/register_travel.php">
       
            <input type="hidden" value="<?php echo $content[$i]["destination"]?>" name="destination">

            <div class="reservation-slider-container">

                <div class="reservation-select">
                    <h5>Hotêl :</h5>
                    <label>
                        <select id="hotel" name="hotel" required>
                        <option value="" selected hidden>Choisissez une option</option>
                            <?php for ($o= 0; $o < count($content[$i]["hotel"]); $o++):?>
                            <option value="<?php echo $content[$i]["hotel"][$o]?>"><?php echo $content[$i]["hotel"][$o]?></option>
                            <?php endfor;?>
                        </select>
                    </label>
                </div>


                <div class="reservation-checkbox">
                    <h5>Activités nautiques :</h5>
                    <div>
                    <?php for ($o = 0; $o < count($content[$i]["loisir"]); $o++): ?>
                    <input type="checkbox" id="loisir<?php echo $o ?>" name="loisir[]" value="<?php echo $content[$i]["loisir"][$o] ?>">
                    <label class="reservation-button" for="loisir<?php echo $o ?>"><?php echo $content[$i]["loisir"][$o] ?></label>
                    <?php endfor; ?>

                    </div>
                </div>


                <div class="reservation-checkbox">
                    <h5>Visite guidée :</h5>
                    <div>
                    <?php for ($o = 0; $o < count($content[$i]["visite"]); $o++): ?>
                    <input type="checkbox" id="visite<?php echo $o ?>" name="visite[]" value="<?php echo $content[$i]["visite"][$o] ?>">
                    <label class="reservation-button" for="visite<?php echo $o ?>"><?php echo $content[$i]["visite"][$o] ?></label>
                    <?php endfor; ?>
                    </div>
                </div>


                <div class="reservation-checkbox">
                    <h5>Activité de détentes :</h5>
                    <div>
                    <?php for ($o = 0; $o < count($content[$i]["relaxation"]); $o++): ?>
                    <input type="checkbox" id="relaxation<?php echo $o ?>" name="relaxation[]" value="<?php echo $content[$i]["relaxation"][$o] ?>">
                    <label class="reservation-button" for="relaxation<?php echo $o ?>"><?php echo $content[$i]["relaxation"][$o] ?></label>
                    <?php endfor; ?>
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
                    <h5>Prix :</h5><h6><?php echo $content[$i]["prix"]?></h6>
                </div>

            </div>
            <div class="button-container" id="buttons">
                <input type="hidden" name="todo" value="modify">
                <button type="submit">Réserver</button>

            </div>
        </form>
        
    </div>
</main>


<?php
require_once "../php_pages/footer.php";
?>


</body>
</html>

