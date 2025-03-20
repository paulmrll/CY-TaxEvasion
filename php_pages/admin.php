<?php
session_start();


if (isset($_SESSION['role']) != "Admin") {

    header("Location: ../index.php");
    exit();
}


$jsonFile = "../data/utilisateurs.json";
if (!file_exists($jsonFile)) {
    exit();
}

$json = file_get_contents($jsonFile);
$content = json_decode($json, true);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Admin</title>
    <link rel="icon" type="image" href="../image/logo-site.webp">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/admin.css">


    <meta charset="UTF-8">
</head>
<body>


<?php
require_once "../php_pages/header.php";
?>

<main>


    <div class="users-container">
        <h1>Panneaux Administrateur</h1>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Mail</th>
                    <th>Rôle</th>
                    <th>Option</th>
                </tr>

                <?php foreach ($content as $index => $user): ?>
                    <tr>
                        <td><?php echo "#" . ($index + 1) ?></td>
                        <td><?php echo htmlspecialchars($user["name"]) ?></td>
                        <td><?php echo htmlspecialchars($user["firstname"]) ?></td>
                        <td><?php echo htmlspecialchars($user["email"]) ?></td>
                        <td><?php echo htmlspecialchars($user["role"]) ?></td>
                        <td>
                            <div class="button-container">

                                <form action="../php_pages/user-info.php" method="POST">
                                    <input type="hidden" name="user_id" value="<?php echo $index; ?>">
                                    <button class="modifier-button" type="submit">Modifier</button>
                                </form>

                                <form action="../php/suppression.php" method="post">
                                    <input type="hidden" name="email" value="<?php echo $user["email"] ?>">
                                    <input type="hidden" name="action" value="delete">
                                    <button class="sup-button" type="submit">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <table>
                <?php 

                $file = "../data/travel.json";
                if (!file_exists($file)){?>
                    <tr><td><?php echo "Aucun Voyage";?></td></tr>
                <?php
                } else {
                    $content_travel = json_decode(file_get_contents($file), true);
                    if ($content_travel == null){?>
                        <tr><td><?php echo "Aucun Voyage";?></td></tr>
                    <?php
                    } else {
                        for ($i = 0; $i < count($content_travel); $i++){?>
                        <tr>
                            <td><?php echo "#" . $i+1;?></td>
                            <td><?php  echo $content_travel[$i]['name'];?>
                            <td><a href="description-pages.php?destination=<?php echo $content_travel[$i]['destination']?>">Voir</a></td>
                            <td><form action="../php/suppression.php" method="post">
                                    <input type="hidden" name="travel" value="<?php echo $content_travel[$i]['destination']?>">
                                    <input type="hidden" name="action" value="delete-travel">
                                    <button class="sup-button" type="submit">Supprimer</button>
                                </form></td>
                        </tr>
                            
                            
                        <?php
                        }
                    }
                }
                ?>
                <tr><td colspan="4"><a href="add_new_travel.php">Ajouter une destination</a></td></tr>
            </table>
            
    </div>
</main>


<?php
require_once "../php_pages/footer.php";
?>


</body>
</html>