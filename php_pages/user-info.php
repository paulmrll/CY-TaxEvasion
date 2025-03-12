<?php

session_start();

if (isset($_SESSION['role']) != "Admin") {
    header("Location: ../php_pages/connexion.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $jsonFile = "../data/utilisateurs.json";
    if (!file_exists($jsonFile)) {
        exit();
    }

    $json = file_get_contents($jsonFile);
    $user_list = json_decode($json, true);


    if (!isset($_POST['user_id'])) {
        header("Location: ../php_pages/admin.php");
        exit();
    }

    $user_id = $_POST['user_id'];

    $n = 0;
    foreach ($user_list as $user) {
        if ($user_id == $n) {

            $name = $user["name"];
            $firstname = $user["firstname"];
            $mail = $user["email"];
            $password = $user["password"];
            $role = $user["role"];
        }
        $n++;
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

                        <form action="../php/modification.php" method="post">
                            <div class="part-container">
                                <h1>Mon Compte :</h1>
                                <div class="compte-info-container-top">



                                    <div class="grid-line-container">
                                        <div>
                                            <a>Nom : </a>
                                            <input type="text" name="name" value="<?php echo $name; ?>"
                                                   required>
                                        </div>

                                    </div>

                                    <div class="grid-line-container">
                                        <div>
                                            <a>Prénom : </a>
                                            <input type="text" value="<?php echo $firstname; ?>"
                                                   name="firstname" required>
                                        </div>

                                    </div>

                                    <div class="grid-line-container">
                                        <div>
                                            <a>Adresse mail : </a>
                                            <input type="mail" name="email" value="<?php echo $mail; ?>"
                                                   required>
                                        </div>
                                    </div>

                                    <div class="grid-line-container">
                                        <div>
                                            <a>Mot de passe : </a>
                                            <input type="password" name="password"
                                                   value="<?php echo $password; ?>" required>
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
                        <?php echo $role; ?>
                    </div>
                </div>


                <div class="box-container">
                    <div class="part-container">
                        <h1>Mes Voyages :</h1>
                        <div class="compte-info-container">
                            <div class="grid-container">

                                <div class="line-container">
                                    <div class="grid-item">
                                        <a href="../php_pages/anguilla.php" class="image-select">
                                            <img src="../image/anguilla.jpg" alt="anguilla">
                                            <h3>Anguilla</h3>
                                        </a>
                                    </div>

                                    <p class="Réservé">Reservé</p>

                                    <div class="date-container">
                                        <p>Date de départ : <strong>00/00/0000</strong></p>
                                        <p>Date de retour : <strong>00/00/0000</strong></p>
                                    </div>
                                </div>

                                <div class="line-container">
                                    <div class="grid-item">
                                        <a href="../php_pages/panama.php" class="image-select">
                                            <img src="../image/le-panama.jpg" alt="le-panama">
                                            <h3>Le Panama</h3>
                                        </a>
                                    </div>
                                    <p class="Payment">En Attente de Payment : 150 000$</p>
                                    <div class="button-payer">
                                        <button>Payer</button>
                                    </div>
                                </div>

                                <div class="line-container">
                                    <div class="grid-item">
                                        <a href="../php_pages/fidji.php" class="image-select">
                                            <img src="../image/les-fidji.jpeg" alt="les_fidji">
                                            <h3>Les Fidji</h3>
                                        </a>
                                    </div>
                                    <p class="Annulé">Annulé</p>
                                </div>

                                <div class="line-container">
                                    <div class="grid-item">
                                        <a href="../php_pages/les-palaos.php" class="image-select">
                                            <img src="../image/les-palaos.jpg" alt="les-palaos">
                                            <h3>Les Palaos</h3>
                                        </a>
                                    </div>
                                    <p class="Effectué">Effectué</p>
                                </div>


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

