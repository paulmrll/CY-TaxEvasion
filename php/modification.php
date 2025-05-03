<?php
session_start();

function user_modification($email, $password, $firstname, $name, $number, $rue, $ville, $cdp, $birth, $todo, $role)
{
    $jsonFile = "../data/utilisateurs.json";
    if (!file_exists($jsonFile)) {
        header('Location: ../php_pages/inscription.php');
    }

    $content = json_decode(file_get_contents($jsonFile), true);
    if ($content == null) {
        header('Location: ../php_pages/inscription.php');
        exit();
    }
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    if (isset($content)) {
        for ($i = 0; $i < count($content); $i++) {
            if ($content[$i]['email'] === $email) {

                $content[$i]['name'] = $name;
                $content[$i]['firstname'] = $firstname;
                $content[$i]['password'] = $password_hash;
                $content[$i]['email'] = $email;
                $content[$i]['adress']["number"] = $number;
                $content[$i]['adress']["rue"] = $rue;
                $content[$i]['adress']["ville"] = $ville;
                $content[$i]['adress']["cdp"] = $cdp;
                $content[$i]['birth'] = $birth;
                $content[$i]['role'] = $role;

                file_put_contents($jsonFile, json_encode($content, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                if ($todo != "modify_client_by_admin") {
                    $_SESSION['email'] = $email;
                    $_SESSION['name'] = $name;
                    $_SESSION['firstname'] = $firstname;
                    $_SESSION['password'] = $password;
                }


            }
        }
    }
}


if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['name']) && isset($_POST['nb']) && isset($_POST['rue']) && isset($_POST['ville']) && isset($_POST['cdp']) && isset($_POST['birth']) && isset($_POST['todo']) && isset($_POST['role'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $name = $_POST['name'];
    $cdp = $_POST['cdp'];
    $rue = $_POST['rue'];
    $nb_rue = $_POST['nb'];
    $ville = $_POST['ville'];
    $birth = $_POST["birth"];
    $birth_time = strtotime($birth);
    $birth_time = date("Y-m-d", $birth_time);
    if ($birth_time >= date("Y-m-d")) {
        header("Location: ../php_pages/user.php");
        exit();
    }
    $todo = $_POST['todo'];
    $role = $_POST['role'];
    user_modification($email, $password, $firstname, $name, $nb_rue, $rue, $ville, $cdp, $birth, $todo, $role);

    if ($todo == "modify_client_by_admin") {
        header("Location: ../php_pages/admin.php");
        exit();
    } else {
        header("Location: ../php_pages/user.php");
        exit();
    }


} else {
    header('Location: ../index.php');
}
?>