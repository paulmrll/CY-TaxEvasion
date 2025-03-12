<?php
session_start();

function user_modification($email, $password, $firstname, $name){
    $jsonFile = "../data/utilisateurs.json";
    if (!file_exists($jsonFile)) {
        exit("Erreur : Le fichier json n'existe pas");
    }

    $content = json_decode(file_get_contents($jsonFile), true);
    if ($content == null){
        header('Location: ../php_pages/inscription.php');
        exit();
    }
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    if (isset($content)) {
        for ($i = 0; $i < count($content); $i++) {
            if ($content[$i]['email'] === $_SESSION['email']) {

                $content[$i]['name'] = $name;
                $content[$i]['firstname'] = $firstname;
                $content[$i]['password'] = $password_hash;
                $content[$i]['email'] = $email;

                file_put_contents($jsonFile, json_encode($content, JSON_PRETTY_PRINT));

                $_SESSION['email'] = $email;
                $_SESSION['name'] = $name;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['password'] = $password;
                header('Location: ../php_pages/user.php');
                exit();
            }
        }
    }
}


if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['name'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $name = $_POST['name'];

    user_modification($email, $password, $firstname, $name);

    header('Location: ../php_pages/user.php');
    exit();
}
?>