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
    </div>
</main>


<?php
require_once "../php_pages/footer.php";
?>


</body>
</html>