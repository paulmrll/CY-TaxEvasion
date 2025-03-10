<?php

session_start();

function change_connexionDate()
{
    if (file_exists("../data/utilisateurs.json")) {
        $content = json_decode(file_get_contents("../data/utilisateurs.json"), true);
        for ($i = 0; $i < count($content); $i++) {
            if ($content[$i]['email'] === $_SESSION['email']) {
                $content[$i]['connexion_date'] = date("d-m-Y H:i:s");
                break;
            }
        }
        file_put_contents("../data/utilisateurs.json", json_encode($content, JSON_PRETTY_PRINT));
    }
}

function connexion($email, $password)
{
    if (file_exists("../data/utilisateurs.json")) {
        if (isset($email) && isset($password)) {
            if (file_exists("../data/utilisateurs.json")) {
                $content = json_decode(file_get_contents("../data/utilisateurs.json"), true);

                for ($i = 0; $i < count($content); $i++) {
                    if ($content[$i]['email'] === $email) {
                        if (password_verify($password, $content[$i]['password'])) {
                            $_SESSION['firstname'] = $content[$i]['firstname'];
                            $_SESSION['name'] = $content[$i]['name'];
                            $_SESSION['email'] = $content[$i]['email'];
                            $_SESSION['password'] = $password;
                            $_SESSION['role'] = $content[$i]['role'];
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
        }
    }
}


if (isset($_POST['email']) && isset($_POST['password'])) {
    date_default_timezone_set('Europe/Paris');
    $email = $_POST['email'];
    $password = $_POST['password'];

    connexion($email, $password);

}

?>