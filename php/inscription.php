<?php


function exist($email)
{
    if (file_exists("../data/utilisateurs.json")) {
        $content = json_decode(file_get_contents("../data/utilisateurs.json"), true);
        for ($i = 0; $i < count($content); $i++) {
            if ($content[$i]['email'] == $email) {
                return true;
            }
        }
        return false;
    }

}

function inscription($name, $firstname, $email, $password)
{



    if (file_exists("../data/utilisateurs.json")) {
        $content = json_decode(file_get_contents("../data/utilisateurs.json"), true);
        if (isset($name) && isset($firstname) && isset($email) && isset($password)) {
            if (exist($email)) {
                header('Location: ../php_pages/connexion.php');
                exit();
            } else {
                $mdp_hash = password_hash($password, PASSWORD_DEFAULT);
                $tab = [
                    "name" => $name,
                    "firstname" => $firstname,
                    "email" => $email,
                    "password" => $mdp_hash,
                    "inscription_date" => date("d-m-Y H:i:s"),
                    "connexion_date" => date("d-m-Y H:i:s"),
                    "role" => "Utilisateur"
                ];
                $content[] = $tab;

                file_put_contents("../data/utilisateurs.json", json_encode($content, JSON_PRETTY_PRINT));

                session_start();
                $_SESSION['firstname'] = $firstname;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header("Location: ../php_pages/user.php");
                exit();
            }
        }
    }
}


if (isset($_POST["name"]) && isset($_POST["firstname"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    date_default_timezone_set('Europe/Paris');
    $name = $_POST["name"];
    $firstname = $_POST["firstname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    inscription($name, $firstname, $email, $password);
} else {
    header("Location: ../php_pages/inscription.php");
    exit();
}