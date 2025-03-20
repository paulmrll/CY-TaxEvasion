<?php
require_once "../php/fonctions_utiles.php";


if (!isset($_SESSION['email'])) {
    header("Location: ../php_pages/connexion.php");
    exit();
}
if (file_exists("../data/travel.json")) {
    $content_travel = json_decode(file_get_contents("../data/travel.json"), true);
} else {
    header('Location: ../php_pages/connexion.php');
    exit();
}
if ($content_travel == null) {
    header('Location: ../php_pages/user_register_travel.php');
    exit();
}
if (!isset($_GET['travel'])){
    header('Location: ../php_pages/user.php');
    exit();
}
$file = "../data/travel-user.json";
        if (!file_exists($file)) {
        } else {
            $content = json_decode(file_get_contents($file), true);
            if ($content == null){
                header('Location: ../php_pages/user_register_travel.php');
                exit();
            }
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
    <?php
    
                $a = -1;
                for ($i = 0; $i < count($content); $i++){
                    if ($content[$i]['email'] === $_SESSION['email']){
                        $a = $i;
                        break;
                    }
                }
                if ($a < 0){
                    header('Location: connexion.php');
                    exit();
                }
                
                $index_travel = -1;
                $index = -1;
                for ($i = 0; $i < count($content[$a]['travels']); $i++){
                    if ($content[$a]['travels'][$i]['destination'] == $_GET['travel']){
                        for ($p = 0; $p < count($content_travel); $p++){
                            if ($content_travel[$p]['destination'] == $_GET['travel']){
                                $url_image = $content_travel[$p]['image'];
                                $index_travel = $p;
                                $index = $i;
                                $name = $content_travel[$p]['name'];
                                break;
                        }
                        
                    }
                }
                }
                if ($index_travel == -1 || !isset($name)){
                    header("Location: user.php");
                    exit();
                }
            

                    
                
            
    ?>

   

    <img src="<?php echo $url_image?>" alt="Image de la destination">
    <h1>Modifier votre voyage à <?php echo $name;?></h1>
    <div class="container">
    <form method="post" action="../php/modification_travel.php">
       
        <input type="hidden" name="destination" value="<?php echo $content_travel[$index_travel]["destination"]?>">

            <div class="reservation-slider-container">

                <div class="reservation-select">
                    <h5>Hotêl :</h5>
                    <label>
                        <select id="hotel" name="hotel" required>
                        <option value="<?php echo $content[$a]['travels'][$index]['hotel']?>"><?php echo $content[$a]['travels'][$index]['hotel']?></option>
                            <?php for ($o= 0; $o < count($content_travel[$index_travel]["hotel"]); $o++):?>
                            <option value="<?php echo $content_travel[$index_travel]["hotel"][$o]?>"><?php echo $content_travel[$index_travel]["hotel"][$o]?></option>
                            <?php endfor;?>
                        </select>
                    </label>
                </div>


                <div class="reservation-checkbox">
                    <h5>Activités nautiques :</h5>
                    <div>
                    <?php for ($o = 0; $o < count($content_travel[$index_travel]["loisir"]); $o++): ?>
                    <input type="checkbox" id="loisir<?php echo $o ?>" name="loisir[]" value="<?php echo $content_travel[$index_travel]["loisir"][$o] ?>"
                    <?php if (in_array($content_travel[$index_travel]["loisir"][$o], $content[$a]['travels'][$index]['loisir'])){
                        echo "checked";
                    }
                    ?>
                    >
                    <label class="reservation-button" for="loisir<?php echo $o ?>"><?php echo $content_travel[$index_travel]["loisir"][$o] ?></label>
                    <?php endfor; ?>

                    </div>
                </div>


                <div class="reservation-checkbox">
                    <h5>Visite guidée :</h5>
                    <div>
                    <?php for ($o = 0; $o < count($content_travel[$index_travel]["visite"]); $o++): ?>
                    <input type="checkbox" id="visite<?php echo $o ?>" name="visite[]" value="<?php echo $content_travel[$index_travel]["visite"][$o] ?>"
                    <?php if (in_array($content_travel[$index_travel]["visite"][$o], $content[$a]['travels'][$index]['visite'])){
                        echo "checked";
                    }
                    ?>
                    >
                    <label class="reservation-button" for="visite<?php echo $o ?>"><?php echo $content_travel[$index_travel]["visite"][$o] ?></label>
                    <?php endfor; ?>
                    </div>
                </div>


                <div class="reservation-checkbox">
                    <h5>Activité de détentes :</h5>
                    <div>
                    <?php for ($o = 0; $o < count($content_travel[$index_travel]["relaxation"]); $o++): ?>
                    <input type="checkbox" id="relaxation<?php echo $o ?>" name="relaxation[]" value="<?php echo $content_travel[$index_travel]["relaxation"][$o] ?>"
                    <?php if (in_array($content_travel[$index_travel]["relaxation"][$o], $content[$a]['travels'][$index]['relaxation'])){
                        echo "checked";
                    }
                    ?>
                    >
                    <label class="reservation-button" for="relaxation<?php echo $o ?>"><?php echo $content_travel[$index_travel]["relaxation"][$o] ?></label>
                    <?php endfor; ?>
                    </div>
                </div>

                <div class="reservation-checkbox">
                    <h5>Dates de départ :</h5>
                    <input id="departure" name="departure" type="date" value="<?php echo $content[$a]["travels"][$index]["departure"]?>"required>

                </div>


                <div class="reservation-checkbox">

                    <h5>Dates de retour :</h5>
                    <input id="return" name="return" type="date" value="<?php echo $content[$a]["travels"][$index]["return"]?>" required>

                </div>

                <div class="reservation-prix">
                    <h5>Prix :</h5><h6><?php echo $content[$a]["travels"][$index]["prix"] . " €"?></h6>
                </div>

            </div>
            <div class="button-container" id="buttons">
                <input type="hidden" name="todo" value="modify">
                <button type="submit">Modifier</button>

            </div>
        </form>
        <form method="post" action="../php/modification_travel.php">
        <input type="hidden" name="destination" value="<?php echo $content_travel[$index_travel]["destination"]?>">
        <input type="hidden" name="todo" value="delete">
        <button type="submit" id="delete">Supprimer le voyage</button>
        </form>

    </div>
</main>


<?php
require_once "../php_pages/footer.php";
?>


</body>
</html>

