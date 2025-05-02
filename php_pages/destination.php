<?php
session_start();

    $jsonFile = "../data/travel.json";
    if (!file_exists($jsonFile)){
        header('Location: ../php_pages/add_travel.php');
        exit();
    }
    $content = json_decode(file_get_contents($jsonFile), true);
    if ($content == null){
        header('Location: ../php_pages/add_travel.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Nos destinations</title>
    <link rel="icon" type="image" href="../image/logo-site.webp">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/destination.css">


    <meta charset="UTF-8">
</head>


<body>

<?php
require_once "../php_pages/header.php";
?>


<main>


    <div class="destination-intro">
        <div class="intro-text">
            <h1>Nos paradis fiscaux n'attendent que vous</h1>

        </div>
        <img class="intro-image" src="../image/destination-intro.jpg" alt="destination-image">
    </div>

    <div class="destination-option-container">
        <h2>Choisissez vos préférences :</h2>

        <div class="destination-option-slider-container">

            <div class="option-select" >
                <h5>Prix :</h5>
                <label>
                    <select id="select-prix">
                        <option value="" selected hidden>Choisissez une option</option>
                        <option value="-10000"> - 10000 $</option>
                        <option value="10000-20000">10000 - 20000 $</option>
                        <option value="+20000"> + 20000 $</option>
                    </select>
                </label>
            </div>



            <div class="option-select">
                <h5>Hôtel :</h5>
                <label>
                    <select id="select-hotel">
                        <option value="" selected hidden>Choisissez une option</option>
                        <option value="5 étoiles">5 étoiles</option>
                        <option value="5 étoiles premium">5 étoiles premium</option>
                        <option value="5 étoiles Premium VIP">5 étoiles Premium VIP</option>
                        <option value="5 étoiles Premium VIP Deluxe">5 étoiles Premium VIP Deluxe</option>
                    </select>
                </label>
            </div>


            <div class="option-select">
                <h5>Continent :</h5>
                <label>
                    <select id="select-continent">
                        <option value="" selected hidden>Choisissez une option</option>
                        <option value="Europe">Europe</option>
                        <option value="Amérique-Centrale">Amérique-Centrale</option>
                        <option value="Amérique-du-Sud">Amérique-du-Sud</option>
                        <option value="Moyen-Orient">Moyen-Orient</option>
                        <option value="Asie">Asie</option>
                        <option value="Océanie">Océanie</option>
                    </select>
                </label>
            </div>
        </div>
    </div>


    <div class="destination-grid" id="voyage-container">
        <div class="grid-container" >



        <?php

            for ($i = 0; $i < count($content); $i++):
        ?>
            <a class="grid-line-container" href="../php_pages/description-pages.php?destination=<?php echo $content[$i]['destination'];?>">
                <div class="grid-item">
                    <div class="image-select">
                        <img src="<?php echo $content[$i]["image"]?>" alt="<?php echo $content[$i]['name'];?>">
                        <h3><?php echo $content[$i]['name'];?></h3>
                        <div class="flag">
                            <img src="<?php echo $content[$i]["image-flag"]?>" alt="<?php echo $content[$i]['name'];?>-flag">
                        </div>
                    </div>
                </div>
                <div class="description-texte">
                    <?php echo $content[$i]['description'];?>
                </div>
            </a>
        <?php endfor;?>



        </div>

    </div>

</main>


<?php
require_once "../php_pages/footer.php";
?>

<script src="../js/trie.js"></script>


</body>

</html>