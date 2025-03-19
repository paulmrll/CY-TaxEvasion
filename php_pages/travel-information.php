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
    <link rel="stylesheet" href="../css/travel-information.css">


    <meta charset="UTF-8">
</head>
<body>

<?php
require_once "../php_pages/header.php";
?>

<main>
    <?php
    if (!isset($_GET['travel'])){
        header('Location: ../php_pages/user.php');
        exit();
    }
    $file = "../data/travel-user.json";
            if (file_exists($file)) {
                $content = json_decode(file_get_contents($file), true);
                if ($content === null){
                    header('Location: ../php_pages/user_register_travel.php');
                    exit();
                }
                for ($i = 0; $i < count($content); $i++){
                    if ($content[$i]['email'] === $_SESSION['email']){
                        $a = $i;
                    }
                }
                if (file_exists("../data/travel.json")) {
                    $content_travel = json_decode(file_get_contents("../data/travel.json"), true);
                } else {
                    header('Location: ../php_pages/inscription.php');
                    exit();
                }
                if ($content_travel === null) {
                    header('Location: ../php_pages/user_register_travel.php');
                    exit();
                }
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
            }
    ?>

   

    <img src="<?php echo $url_image?>" alt="Image de la destination">
    <h1>Modifier votre voyage à <?php echo $name?></h1>
    <div class="container">

       


            <div class="reservation-slider-container">

                <div class="reservation-select">
                    <h5>Hotêl :</h5><h6><?php echo $content[$a]['travels'][$index]['hotel']?></h6>
                    
                </div>


                <div class="reservation-checkbox">
                    <h5>Activités nautiques :</h5>
                    <div>
                    <?php for ($o = 0; $o < count($content[$a]['travels'][$index]["loisir"]); $o++): ?>
                    <h6><?php echo $content[$a]['travels'][$index]['loisir'][$o]?></h6>
                    <?php endfor; ?>

                    </div>
                </div>


                <div class="reservation-checkbox">
                    <h5>Visite guidée :</h5>
                    <div>
                    <?php for ($o = 0; $o < count($content[$a]['travels'][$index]["visite"]); $o++): ?>
                    <h6><?php echo $content[$a]['travels'][$index]['visite'][$o]?></h6>
                    <?php endfor; ?>
                    </div>
                </div>


                <div class="reservation-checkbox">
                    <h5>Activité de détentes :</h5>
                    <div>
                    <?php for ($o = 0; $o < count($content[$a]['travels'][$index]["relaxation"]); $o++): ?>
                    <h6><?php echo $content[$a]['travels'][$index]['relaxation'][$o]?></h6>
                    <?php endfor; ?>
                    </div>
                </div>

                <div class="reservation-checkbox">
                    <h5>Dates de départ :</h5>
                    <h6><?php echo $content[$a]['travels'][$index]['departure']?></h6>

                </div>


                <div class="reservation-checkbox">

                    <h5>Dates de retour :</h5>
                    <h6><?php echo $content[$a]['travels'][$index]['return']?></h6>

                </div>

                <div class="reservation-prix">
                    <h5>Prix :</h5><h6>Beaucoup Trop Cher</h6>
                </div>

            </div>
            <a href="../php/define-index-travel.php?action=modify&travel=<?php echo $content[$a]['travels'][$index]['destination']?>">Modifier</a>
       
    </div>
</main>


<?php
require_once "../php_pages/footer.php";
?>


</body>
</html>

