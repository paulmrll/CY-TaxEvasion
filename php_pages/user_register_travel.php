<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title> Malte</title>
    <link rel="icon" type="image" href="../image/logo-site.webp">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/destination-description.css">


</head>

<body>

<?php
require_once "../php_pages/header.php";
?>

<?php
if (isset($_POST["destination"])){
    $destination = $_POST["destination"];
    $destination = strtolower($destination);
    $destination[0] = strtoupper($destination[0]);
    $jsonFile = "../data/travel.json";
    $content = json_decode(file_get_contents($jsonFile), true);
    if ($content == null){
        header('Location: ../php_pages/add_travel.php');
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
    }
}
?>


<main>


    <div class="reservation-option-container">
        <h2>Votre réservation à <?php echo $content[$i]["destination"]?></h2>
        <form method="post" action="../php/register_travel.php">
            <input type="hidden" name="destination" value="malte">


            <div class="reservation-slider-container">

                <div class="reservation-select">
                    <h5>Hotêl :</h5>
                    <label>
                        <select id="hotel" name="hotel" required>
                            <?php
                            for ($a = 0; $a < count($content[$i]['hotel']); $a++) {
                                echo "<option value='" . $content[$i]['hotel'][$a] . "'>" . $content[$i]['hotel'][$a] . "</option>";
                            }
                            ?>
                        </select>
                    </label>
                </div>


                <div class="reservation-checkbox">
                    <h5>Activités nautiques :</h5>
                    <div>
                        <?php
                        for ($a = 0; $a < count($content[$i]['loisir']); $a++):
                           
                        ?>
                        <input type="checkbox" id="loisir<?php echo"$a"?>" name="loisir[]" value="<?php echo $content[$i]['loisir'][$a] ?>">
                        <label class="reservation-button" for="loisir<?php echo"$a"?>"><?php echo $content[$i]['loisir'][$a] ?></label>

                        <?php
                        endfor;
                        ?>
                </div>


                <div class="reservation-checkbox">
                    <h5>Visite guidée :</h5>
                    <div>
                    <?php
                        for ($a = 0; $a < count($content[$i]['visite']); $a++):
                           
                        ?>
                        <input type="checkbox" id="visite<?php echo"$a"?>" name="visite[]" value="<?php echo $content[$i]['visite'][$a] ?>">
                        <label class="reservation-button" for="visite<?php echo"$a"?>"><?php echo $content[$i]['visite'][$a] ?>s</label>

                        <?php
                        endfor;
                        ?>
                    </div>
                </div>


                <div class="reservation-checkbox">
                    <h5>Activité de détentes :</h5>
                    <div>
                    <?php
                        for ($a = 0; $a < count($content[$i]['relaxation']); $a++):
                           
                        ?>
                        <input type="checkbox" id="détente<?php echo"$a"?>" name="relaxation[]" value="<?php echo $content[$i]['relaxation'][$a] ?>">
                        <label class="reservation-button" for="détente<?php echo"$a"?>"><?php echo $content[$i]['relaxation'][$a] ?></label>

                        <?php
                        endfor;
                        ?>
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
            <br><br><br>
            <div class="button-container" id="buttons">
                <button type="submit">Réserver</button>
                <button type="reset">Reset</button>
            </div>
        </form>
    </div>

<?php
require_once "../php_pages/footer.php";
?>
</body>

</html>
