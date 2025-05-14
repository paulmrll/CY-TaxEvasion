<?php

require_once "../php/fonctions_utiles.php";


if (!isset($_SESSION['email']) || !isset($_SESSION['name']) || !isset($_SESSION['firstname']) || !isset($_SESSION['role']) || !isset($_SESSION['password'])) {
    header("Location: ../php_pages/connexion.php");
    exit();
}
$file = "../data/utilisateurs.json";
if (!file_exists("../data/utilisateurs.json")) {
    header('Location: inscription.php');
    exit();
}
$content_user = json_decode(file_get_contents($file), true);
if ($content_user == null) {
    header('Location: inscription.php');
    exit();
}
for ($i = 0; $i < count($content_user); $i++) {
    if ($content_user[$i]["email"] == $_SESSION["email"]) {
        $index_user = $i;
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Utilisateur</title>
    <link rel="icon" type="image" href="../image/logo-site.webp">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/user.css">


    <meta charset="UTF-8">
</head>
<body>

<?php
require_once "../php_pages/header.php";
?>

<main>


    <div class="utilisateur">
        <div class="main-grid">
            <div class="compte-info-container">
                <div class="utilisateur-line-container">
                    <div class="box-container">

                        <form id="form1" action="../php/modification.php" method="post">
                            <div class="part-container">
                                <h1>Mon Compte :</h1>
                                <div class="compte-info-container-top">


                                    <div class="grid-line-container">
                                        <div>
                                            <a>Nom : </a>
                                            <input type="text" name="name" value="<?php echo $_SESSION['name']; ?>"
                                                   required>
                                            <img class="modif-image" src="../image/visibility-logo.png" alt="image-utilisateur">

                                        </div>

                                    </div>

                                    <div class="grid-line-container">
                                        <div>
                                            <a>Prénom : </a>
                                            <input type="text" name="firstname"
                                                   value="<?php echo $_SESSION['firstname']; ?>"
                                                   required>
                                            <img class="modif-image" src="../image/visibility-logo.png" alt="image-utilisateur">

                                        </div>

                                    </div>

                                    <div class="grid-line-container">
                                        <div>
                                            <a>Adresse mail : </a>
                                            <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>"
                                                   required>
                                            <img class="modif-image" src="../image/visibility-logo.png" alt="image-utilisateur">

                                        </div>
                                    </div>

                                    <div class="grid-line-container">
                                        <div>
                                            <a>Mot de passe : </a>
                                            <input type="password" name="password"
                                                   value="<?php echo $_SESSION['password']; ?>" required>
                                            <img class="modif-image" src="../image/visibility-logo.png" alt="image-utilisateur">

                                        </div>
                                    </div>
                                    <div class="grid-line-container">
                                        <div>
                                            <a>Numéro de rue : </a>
                                            <input type="number" name="nb"
                                                   value="<?php echo $content_user[$index_user]["adress"]['number']; ?>"
                                                   min="1" required>
                                            <img class="modif-image" src="../image/visibility-logo.png" alt="image-utilisateur">

                                        </div>
                                    </div>
                                    <div class="grid-line-container">
                                        <div>
                                            <a>Rue : </a>
                                            <input type="text" name="rue"
                                                   value="<?php echo $content_user[$index_user]["adress"]['rue']; ?>"
                                                   required>
                                            <img class="modif-image" src="../image/visibility-logo.png" alt="image-utilisateur">

                                        </div>
                                    </div>
                                    <div class="grid-line-container">
                                        <div>
                                            <a>Ville : </a>
                                            <input type="text" name="ville"
                                                   value="<?php echo $content_user[$index_user]["adress"]['ville']; ?>"
                                                   required>
                                            <img class="modif-image" src="../image/visibility-logo.png" alt="image-utilisateur">

                                        </div>
                                    </div>
                                    <div class="grid-line-container">
                                        <div>
                                            <a>Code postal : </a>
                                            <input type="text" name="cdp"
                                                   value="<?php echo $content_user[$index_user]["adress"]['cdp']; ?>"
                                                   required>
                                            <img class="modif-image" src="../image/visibility-logo.png" alt="image-utilisateur">

                                        </div>
                                    </div>
                                    <div class="grid-line-container">
                                        <div>
                                            <a>Date de Naissance : </a>
                                            <input type="date" name="birth"
                                                   value="<?php echo $content_user[$index_user]['birth']; ?>" required>
                                            <img class="modif-image" src="../image/visibility-logo.png" alt="image-utilisateur">

                                        </div>
                                    </div>

                                    <input type="hidden" name="role"
                                           value="<?php echo $content_user[$index_user]['role']; ?>" required>

                                    <div class="grid-line-container">
                                        <div>
                                            <img class="reload-image" src="../image/reload.png" alt="image-utilisateur">
                                        </div>
                                    </div>



                                    <input type="hidden" name="todo" value="modify_client">

                                    <div class="button-container">
                                        <button type="button" class="button-modifier">Modifier</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                        <a class="button" href="../php_pages/add_card.php">Ajouter Votre CB</a>
                    </div>

                    <div class="utilisateur-image">
                        
                        <button>
                            <img src="<?php if ($_SESSION['role'] == "Admin"){
                                echo "../image/admin-logo.png";
                            }else {
                                echo "../image/user-icone.png";
                            } ?>" alt="image-utilisateur">
                        </button>
                        <?php echo $_SESSION['role']; ?>
                    </div>
                </div>


                <div class="box-container">
                    <div class="part-container">
                        <?php

                        if (file_exists("../data/travel-user.json")) {
                        $content = json_decode(file_get_contents("../data/travel-user.json"), true);
                        if ($content != null) {
                            if (isset($_SESSION['email'])) {
                            for ($i = 0; $i < count($content); $i++) {
                                if ($content[$i]["email"] === $_SESSION['email']) {
                                    $a = $i;
                                    break;
                                } else {
                                    $a = -2;
                                }
                            }
                        }
                        if (file_exists("../data/travel.json")) {
                            $content_travel = json_decode(file_get_contents("../data/travel.json"), true);
                        } 

                        if ($a < 0 || count($content[$a]['travels']) == 0 || $content_travel === null || $content == null) {
                            echo "<h1>Vous n'avez pas encore de voyages</h1>";
                        }  else {
                        echo "<h1>Mes Voyages :</h1>";
                        for ($i = 0; $i < count($content[$a]['travels']); $i++):

                        for ($o = 0; $o < count($content_travel); $o++):
                            if ($content[$a]['travels'][$i]['destination'] === $content_travel[$o]['destination']) {
                                $url_image = $content_travel[$o]['image'];
                                $name = $content_travel[$o]['name'];
                                break;
                            }
                        endfor;
                        ?>

                        <div class="compte-info-container">
                            <div class="grid-container">
                                <div class="line-container">
                                    <div class="grid-item">
                                        <a href="description-pages.php?destination=<?php echo $content[$a]["travels"][$i]["destination"] ?>"
                                           class="image-select">
                                            <img src="<?php echo $url_image ?>" alt="image">
                                            <h3><?php echo $name ?></h3>
                                        </a>
                                    </div>
                                    <?php
                                    if ($content[$a]['travels'][$i]['reservation'] == "Paiement en attente"):?>
                                        <a href="../php_pages/paiement.php?destination=<?php echo $content[$a]["travels"][$i]["destination"] ?>">
                                            <p class="Non-réservé">
                                                <?php
                                                echo $content[$a]['travels'][$i]['reservation'] . " de " . $content[$a]['travels'][$i]['prix'] . "€";
                                                ?> <h2>Cliquer ci-dessus pour payer</h2>
                                            </p></a>
                                    <?php else: ?>
                                        <p class="Réservé">
                                            <?php
                                            echo $content[$a]['travels'][$i]['reservation'];
                                            ?>
                                        </p>
                                    <?php endif; ?>
                                    <div class="date-container">
                                        <p>Du : <strong><?php echo $content[$a]['travels'][$i]['departure'] ?></strong>
                                        </p>
                                        <p>Au : <strong><?php echo $content[$a]['travels'][$i]['return'] ?></strong></p>
                                    </div>
                                    <?php if ($content[$a]['travels'][$i]['reservation'] == "Paiement en attente") { ?>
                                        <a class="button-voyage"
                                           href="../php/define-index-travel.php?action=modify&travel=<?php echo $content[$a]["travels"][$i]["destination"] ?>"
                                           method="get">Modifier</a>
                                    <?php } ?>
                                    <a class="button-voyage"
                                       href="../php/define-index-travel.php?action=see&travel=<?php echo $content[$a]['travels'][$i]['destination'] ?>">Voir</a>


                                        <?php ?>
                                </div>


                                <?php
                                endfor;
                                }

                                } 
                            }else {
                                echo "<h1>Vous n'avez pas encore de Voyages</h1>";
                            }
                                ?>


                            </div>
                        </div>

                    </div>

                </div>
                        </div>
                        </div>

                <div class="box-container">
                    <?php
                    $compteur = 0;
                    for ($i = 0; $i < count($content[$a]['travels']); $i++){
                        if ($content[$a]['travels'][$i]['reservation'] != "Payé") {
                            $compteur++;
                        }
                    }
                        for ($i = 0; $i < count($content[$a]['travels']); $i++):

                        for ($o = 0; $o < count($content_travel); $o++):
                            if ($content[$a]['travels'][$i]['reservation'] === "Payé") {
                                break;
                            }
                            else if ($content[$a]['travels'][$i]['destination'] === $content_travel[$o]['destination'] ) {
                                $url_image = $content_travel[$o]['image'];
                                $name = $content_travel[$o]['name'];
                                break;
                            }
                        endfor;
                        if ($content[$a]['travels'][$i]['reservation'] === "Payé") {
                            
                        } else {
                        ?>

                    <div class="box-container">
                        <div class="part-container">
                            
                            <?php

                            if ($compteur > 0) {
                                 echo "<h1>Panier :</h1>";
                            } else {
                                echo "<h1>Rien dans le panier</h1>";
                               
                                
                            }
                            ?>

                            
                        <div class="compte-info-container">
                            <div class="grid-container">
                                <div class="line-container">
                                    <div class="grid-item">
                                        <a href="description-pages.php?destination=<?php echo $content[$a]["travels"][$i]["destination"] ?>"
                                           class="image-select">
                                            <img src="<?php echo $url_image ?>" alt="image">
                                            <h3><?php echo $name ?></h3>
                                        </a>
                                    </div>
                                    <?php
                                    if ($content[$a]['travels'][$i]['reservation'] == "Paiement en attente"):?>
                                        <a href="../php_pages/paiement.php?destination=<?php echo $content[$a]["travels"][$i]["destination"] ?>">
                                            <p class="Non-réservé">
                                                <?php
                                                echo $content[$a]['travels'][$i]['reservation'] . " de " . $content[$a]['travels'][$i]['prix'] . "€";
                                                ?> <h2>Cliquer ci-dessus pour payer</h2>
                                            </p></a>
                                    <?php else: ?>
                                        <p class="Réservé">
                                            <?php
                                            echo $content[$a]['travels'][$i]['reservation'];
                                            ?>
                                        </p>
                                    <?php endif; ?>
                                    <div class="date-container">
                                        <p>Du : <strong><?php echo $content[$a]['travels'][$i]['departure'] ?></strong>
                                        </p>
                                        <p>Au : <strong><?php echo $content[$a]['travels'][$i]['return'] ?></strong></p>
                                    </div>
                                    <?php if ($content[$a]['travels'][$i]['reservation'] == "Paiement en attente") { ?>
                                        <a class="button-voyage"
                                           href="../php/define-index-travel.php?action=modify&travel=<?php echo $content[$a]["travels"][$i]["destination"] ?>"
                                           method="get">Modifier</a>
                                    <?php } ?>
                                    <a class="button-voyage"
                                       href="../php/define-index-travel.php?action=see&travel=<?php echo $content[$a]['travels'][$i]['destination'] ?>">Voir</a>



                                </div>


                                <?php
                                }
                                endfor;
                                if ($compteur == 0) {
                                    echo "<h1>Rien dans le panier</h1>";
                                } 
                                ?>



                </div>
                            </div>
        </div>

    </div>
    </div>
    </main>
    <?php
require_once "../php_pages/footer.php";
?>



<script src="../js/user.js"></script>

</body>

</html>

