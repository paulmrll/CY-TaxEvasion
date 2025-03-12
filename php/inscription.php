<?php
require_once "fonctions_utiles.php";

function exist($email){
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


function create_user($name, $firstname, $email, $password){
    if (isset($name) && isset($firstname) && isset($email) && isset($password)) {
        $mdp_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $tab = [
            "name" => $name,
            "firstname" => $firstname,
            "email" => $email,
            "password" => $mdp_hash,
            "inscription_date" => date("d-m-Y H:i:s"),
            "connexion_date" => date("d-m-Y H:i:s"),
            "role" => "Utilisateur",
            "travels" => [[
                "Country" => [],
                "Date" => [],
                "Number of persone" => [],
                "Price" => [],
                "Duration" => [],
                "Days" => []
            ]], 
            "card" => [
                "card" => 0,
                "date" => 0,
                "cvv" => 0
            ]
        ];
        
    }
    return $tab;
}



function inscription($name, $firstname, $email, $password){
    $role = "Utilisateur";
    if (file_exists("../data/utilisateurs.json")) {
        $content = json_decode(file_get_contents("../data/utilisateurs.json"), true);
        $name = change_variable($name);
        $firstname = change_variable($firstname);
        $email = change_email($email);
        $tab = create_user($name, $firstname, $email, $password);
        if ($content === null){
            file_put_contents("../data/utilisateurs.json", json_encode([$tab], JSON_PRETTY_PRINT));
            session_start();
            start_session($email, $name, $firstname, $password, $role);
            header('Location: ../php_pages/user.php');
            exit();
        } else {
            if (exist($email)) {
                header('Location: ../php_pages/connexion.php');
                exit();
            } else {
                $content[] = $tab;
                file_put_contents("../data/utilisateurs.json", json_encode($content, JSON_PRETTY_PRINT));
                session_start();
                start_session($email, $name, $firstname, $password, $role);
                header('Location: ../php_pages/user.php');
                exit();
            }
        }
    } else {
        $tab = create_user($name, $firstname, $email, $password);
            file_put_contents("../data/utilisateurs.json", json_encode([$tab], JSON_PRETTY_PRINT));
            session_start();
            start_session($email, $name, $firstname, $password, $role);
            header('Location: ../php_pages/user.php');
            exit();
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