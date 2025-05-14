<?php

session_start();

if (isset($_SESSION['role']) != "Admin") {
    header("Location: ../php_pages/connexion.php");
    exit();
}
if (!isset($_POST['user_id'])) {
    header('Location: admin.php');
    exit();
}
$file = "../data/utilisateurs.json";
if (!file_exists($file)) {
    header('Location: inscription.php');
    exit();
}
$content_user = json_decode(file_get_contents($file), true);
if ($content_user == null) {
    header('Location: admin.php');
    exit();
}
$file_travel = "../data/travel.json";
if (!file_exists($file_travel)) {
    header('Location: inscription.php');
    exit();
}
$content_travel = json_decode(file_get_contents($file_travel), true);
if ($content_travel == null) {
    header('Location: admin.php');
    exit();
}
$file_travel_user = "../data/travel-user.json";
if (!file_exists($file_travel_user)) {
    header('Location: inscription.php');
    exit();
}
$content = json_decode(file_get_contents($file_travel_user), true);
if ($content == null) {
    header('Location: admin.php');
    exit();
}
$id = $_POST['user_id'];
if ($id > count($content_user) - 1 || $id < 0) {
    header('Location: inscription.php');
    exit();
}
$a = 0;
$id_travel = -1;
for ($i = 0; $i < count($content); $i++) {
    if ($content[$i]["email"] == $content_user[$id]["email"]) {
        $id_travel = $i;
        $a = 1;
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

                        <form id="form-modifier" action="../php/modification.php" method="post">
                            <div class="part-container">
                                <h1>Compte de <?php echo $content_user[$id]['firstname']; ?> :</h1>
                                <div class="compte-info-container-top">


                                    <div class="grid-line-container">
                                        <div>
                                            <a>Nom : </a>
                                            <input type="text" name="name"
                                                   value="<?php echo $content_user[$id]['name']; ?>"
                                                   required>
                                        </div>

                                    </div>

                                    <div class="grid-line-container">
                                        <div>
                                            <a>Prénom : </a>
                                            <input type="text" value="<?php echo $content_user[$id]['firstname']; ?>"
                                                   name="firstname" required>

                                        </div>
                                    </div>


                                    <div class="grid-line-container">
                                        <div>
                                            <a>Adresse mail : <?php echo $content_user[$id]['email']; ?></a>
                                            <input type="hidden" name="email"
                                                   value="<?php echo $content_user[$id]['email']; ?>"
                                                   required>

                                        </div>
                                    </div>


                                    <input type="hidden" name="password"
                                           value="<?php echo $content_user[$id]['password']; ?>" required>

                                    <input type="hidden" name="nb"
                                           value="<?php echo $content_user[$id]['adress']["number"]; ?>" required>

                                    <input type="hidden" name="rue"
                                           value="<?php echo $content_user[$id]['adress']["rue"]; ?>" required>
                                    <input type="hidden" name="ville"
                                           value="<?php echo $content_user[$id]['adress']["ville"]; ?>" required>
                                    <input type="hidden" name="cdp"
                                           value="<?php echo $content_user[$id]['adress']["cdp"]; ?>" required>
                                    <input type="hidden" name="birth" value="<?php echo $content_user[$id]["birth"]; ?>"
                                           required>
                                    <input type="hidden" name="todo" value="modify_client_by_admin">

                                    <input type="hidden" name="role" id="role-hidden"
                                           value="<?php echo $content_user[$id]['role']; ?>">


                                    <div class="button-container">
                                        <button type="button" id="button-modify" class="button-modifier">Modifier
                                        </button>
                                        <button type="button" id="button-return" class="button-modifier"
                                                onclick="history.back()">Retour
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="utilisateur-image">
                        <button>
                            <img src="../image/user-icone.png" alt="image-utilisateur">
                        </button>

                        <select class="role-select" name="role" id="role-select">
                            <?php if ($content_user[$id]['role'] === 'VIP'): ?>
                                <option value="Admin">VIP</option>
                                <option value="Utilisateur">Utilisateur</option>
                                <option value="VIP">Admin</option>
                            <?php elseif ($content_user[$id]['role'] === 'Utilisateur'): ?>
                                <option value="Utilisateur">Utilisateur</option>
                                <option value="Admin">Admin</option>
                                <option value="VIP">VIP</option>
                            <?php endif; ?>
                        </select>

                    </div>
                </div>


                <div class="box-container">
                    <div class="part-container">
                        <h1>Voyages de <?php echo $content_user[$id]['firstname']; ?> :</h1>
                        <?php
                        if ($id_travel > 0){


                        for ($i = 0;
                        $i < count($content[$id_travel]['travels']);
                        $i++){
                        for ($o = 0; $o < count($content_travel); $o++) {
                            if ($content[$id_travel]['travels'][$i]["destination"] == $content_travel[$o]["destination"]) {
                                $name = $content_travel[$o]["name"];
                                $url_image = $content_travel[$o]["image"];
                                break;
                            }
                        }

                        ?>
                        <div class="compte-info-container">
                            <div class="grid-container">

                                <div class="line-container">
                                    <div class="grid-item">
                                        <a href="../php_pages/destination-pages?destination=<?php echo $content[$id_travel]["travels"][$i]["destination"] ?>"
                                           class="image-select">
                                            <img src="../image/<?php echo $url_image ?>" alt="<?php echo $name ?>">
                                            <h3><?php echo $name ?></h3>
                                        </a>
                                    </div>

                                    <?php
                                    if ($content[$id_travel]['travels'][$i]['reservation'] == "Paiement en attente"):?>
                                        <p class="Non-réservé">
                                            <?php
                                            echo $content[$id_travel]['travels'][$i]['reservation'] . " de " . $content[$a]['travels'][$i]['prix'] . "€"; ?>
                                        </p>
                                    <?php else: ?>
                                        <p class="Réservé">
                                            <?php
                                            echo $content[$id_travel]['travels'][$i]['reservation'];
                                            ?>
                                        </p>
                                    <?php endif; ?>

                                    <div class="date-container">
                                        <p>Date de départ :
                                            <strong><?php echo $content[$id_travel]['travels'][$i]['departure']; ?></strong>
                                        </p>
                                        <p>Date de retour :
                                            <strong><?php echo $content[$id_travel]['travels'][$i]['return']; ?></strong>
                                        </p>
                                    </div>
                                </div>
                                <?php }
                                } else {
                                    echo "<h3>Aucun voyage réservé</h3>";
                                } ?>


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

<script src="../js/admin.js"></script>


</body>
</html>

