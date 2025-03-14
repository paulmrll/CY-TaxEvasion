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
    } else {
        header('Location: ../php_pages/connexion.php');
        exit();
    }
    ?>

   
    <img class="voyage-image" src="<?php echo $url_image?>" alt="Image de la destination">
    
    <h1>Votre voyage à <?php echo $content[$a]['travels'][$_SESSION['index-travel']]['destination'];?></h1>
    
    <div class="container">
    <div class="title">
    <h2>Hotel : </h2><p> <?php echo $content[$a]['travels'][$_SESSION['index-travel']]['hotel']?></p>
    </div>
    <div class="container-liste">
        
        <div class="column">
            <h2>Loisirs</h2>
            <ul>
                <?php
                for ($i = 0; $i < count($content[$a]['travels'][$_SESSION['index-travel']]['loisir']); $i++){
                    echo "<li>".$content[$a]['travels'][$_SESSION['index-travel']]['loisir'][$i]."</li>";
                }
                
                ?>
            </ul>
        </div>
        <div class="column">
            <h2>Visites</h2>
            <ul>
            <?php
            for ($i = 0; $i < count($content[$a]['travels'][$_SESSION['index-travel']]['visite']); $i++){
                echo "<li>".$content[$a]['travels'][$_SESSION['index-travel']]['visite'][$i]."</li>";
            }
            ?>
            </ul>
        </div>
        <div class="column">
            <h2>Relaxation</h2>
            <ul>
            <?php
            for ($i = 0; $i < count($content[$a]['travels'][$_SESSION['index-travel']]['relaxation']); $i++){
                echo "<li>".$content[$a]['travels'][$_SESSION['index-travel']]['relaxation'][$i]."</li>";
            }
            ?>
            </ul>
            
        </div>
    </div>
        </div>
</main>


<?php
require_once "../php_pages/footer.php";
?>


</body>
</html>

