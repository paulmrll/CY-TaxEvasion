<?php

require_once "fonctions_utiles.php";
session_start();



function connexion($email, $password)
{
    if (file_exists("../data/utilisateurs.json")) {
        if (isset($email) && isset($password)) {
            $email = change_email($email);

                $content = json_decode(file_get_contents("../data/utilisateurs.json"), true);
                if ($content === null){
                    header('Location: ../php_pages/inscription.php');
                    exit();
                }
                for ($i = 0; $i < count($content); $i++) {
                    if ($content[$i]['email'] === $email) {
                        if (password_verify($password, $content[$i]['password'])) {
                            start_session($email, $content[$i]['name'], $content[$i]['firstname'], $password, $content[$i]['role']);
                            change_connexionDate();
                            header('Location: ../php_pages/user.php');
                            exit();
                        } else {
                            header('Location: ../php_pages/connexion.php');
                            exit();
                        }
                    }
                }
                header('Location: ../php_pages/inscription.php');
                exit(); 
        }
    } else {
        header('Location: ../php_pages/inscription.php');
        exit();
    }
}


if (isset($_POST['email']) && isset($_POST['password'])) {
    date_default_timezone_set('Europe/Paris');
    $email = $_POST['email'];
    $password = $_POST['password'];

    connexion($email, $password);

}

?>
