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

                        <form action="../php/modification.php" method="post">
                            <div class="part-container">
                                <h1>Mon Compte :</h1>
                                <div class="compte-info-container-top">



                                    <div class="grid-line-container">
                                        <div>
                                            <a>Nom : </a>
                                            <input type="text" name="name" value="<?php echo $_SESSION['name']; ?>"
                                                   required>
                                        </div>

                                    </div>

                                    <div class="grid-line-container">
                                        <div>
                                            <a>Prénom : </a>
                                            <input type="text" name="firstname" value="<?php echo $_SESSION['firstname']; ?>"
                                                    required>
                                        </div>

                                    </div>

                                    <div class="grid-line-container">
                                        <div>
                                            <a>Adresse mail : </a>
                                            <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>"
                                                   required>
                                        </div>
                                    </div>

                                    <div class="grid-line-container">
                                        <div>
                                            <a>Mot de passe : </a>
                                            <input type="password" name="password"
                                                   value="<?php echo $_SESSION['password']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="button-container">
                                        <button class="button-modifier">Modifier</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="utilisateur-image">
                        <button>
                            <img src="../image/user-icone.png" alt="image-utilisateur">
                        </button>
                        <?php echo $_SESSION['role']; ?>
                    </div>
                </div>


                <div class="box-container">
                    <div class="part-container">
                            <?php
                                if (file_exists("../data/utilisateurs.json")) {
                                    $content = json_decode(file_get_contents("../data/utilisateurs.json"), true);
                                    if ($content === null){
                                        header('Location: ../php_pages/inscription.php');
                                        exit();
                                    }
                                    if (isset($_SESSION['email'])) {
                                        $a = find_user($_SESSION['email']);
                                        if (count($content[$a]['travels']) == 0) {
                                            echo "<h1>Vous n'avez pas encore réservé de voyage</h1>";
                                        } else {
                                            echo "<h1>Mes Voyages :</h1>";
                                        }
                                        for ($i = 0; $i < count($content[$a]['travels']); $i++):
                                            $infos = get_url($content[$a]['travels'][$i]['destination']);
                                            $name = $infos[0];
                                            $url = $infos[1];
                                            $url_image = $infos[2];
                                                ?>
                                            
                        <div class="compte-info-container">
                            <div class="grid-container">
                                <div class="line-container">
                                    <div class="grid-item">
                                        <a href="<?php echo $url ?>" class="image-select">
                                            <img src="<?php echo $url_image?>" alt="image">
                                            <h3><?php echo $name ?></h3>
                                        </a>
                                    </div>
                                <?php 
                                    if ($content[$a]['travels'][$i]['reservation'] == "Paiement en attente"):?>
                                    <a href="../php_pages/add_card.php">
                                    <p class="Non-réservé">
                                        <?php
                                        echo $content[$a]['travels'][$i]['reservation'];
                                        ?>
                                    </p></a>
                                    <?php else: ?>
                                    <p class="Réservé">
                                        <?php
                                        echo $content[$a]['travels'][$i]['reservation'];
                                        ?>
                                    </p>
                                    <?php endif; ?>
                                        <div class="date-container">
                                            <p>Date de départ : <strong><?php echo $content[$a]['travels'][$i]['departure']?></strong></p>
                                            <p>Date de retour : <strong><?php echo $content[$a]['travels'][$i]['return']?></strong></p>
                                        </div>
                                        <div class="modification-container">
                                            <form action="../php/define-index-travel.php" method="post">
                                                <input type="hidden" name="index-travel" value="<?php echo $i ?>">
                                                <input type="hidden" name="todo" value="modify">
                                                <button class="button-modifier">Modifier</button>
                                            </form>
                                        </div>  
                                        <div class="modification-container">
                                            <form action="../php/define-index-travel.php" method="post">
                                                <input type="hidden" name="index-travel" value="<?php echo $i ?>">
                                                <input type="hidden" name="todo" value="see">
                                                <button class="button-modifier">Voir</button>
                                            </form>
                                        </div> 
                                    </div>
                                    
                                        
                                <?php
                                endfor;
                                    }
                                } else {
                                    header('Location: ../php_pages/inscription.php');
                                    exit();
                                    }
                                ?>



                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
</main>


<?php
require_once "../php_pages/footer.php";
?>


</body>
</html>

