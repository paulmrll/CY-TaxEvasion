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


function create_user($name, $firstname, $email, $password, $nb_rue, $rue, $ville, $cdp, $birth){
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
            "card" => [
                "name" => "",
                "number" => 0,
                "date" => 0,
                "cvv" => 0
            ],
            "birth" => $birth,
            "adress" => [
                "number" => $nb_rue,
                "rue" => $rue,
                "ville" => $ville,
                "cdp" => $cdp
            ]
        ];
    }
    return $tab;
}



function inscription($name, $firstname, $email, $password, $nb_rue, $rue, $ville, $cdp, $birth){
    $role = "Utilisateur";
    $tab = create_user($name, $firstname, $email, $password, $nb_rue, $rue, $ville, $cdp, $birth);
    if (file_exists("../data/utilisateurs.json")) {
        $content = json_decode(file_get_contents("../data/utilisateurs.json"), true);
        $name = change_variable($name);
        $firstname = change_variable($firstname);
        $email = change_email($email);
        if ($content === null){
            file_put_contents("../data/utilisateurs.json", json_encode([$tab], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            session_start();
            start_session($email, $name, $firstname, $password, $role);
        } else {
            if (exist($email)) {
                header('Location: ../php_pages/connexion.php');
                exit();
            } else {
                $content[] = $tab;
                file_put_contents("../data/utilisateurs.json", json_encode($content, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                session_start();
                start_session($email, $name, $firstname, $password, $role);
            }
        }
    } else {
            file_put_contents("../data/utilisateurs.json", json_encode([$tab], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            session_start();
            start_session($email, $name, $firstname, $password, $role);
    }
}

function create_travel_user(){
    
    $jsonFile = "../data/travel-user.json";
    if (!isset($_SESSION["email"])){
        header('Location: ../php_pages/connexion.php');
        exit();
    }
    $tab = [
        "email" => $_SESSION["email"],
        "travels" => []
    ];
    $content = file_get_contents($jsonFile);
    $content = json_decode($content, true);
    if (!file_exists($jsonFile)) {
        file_put_contents($jsonFile, json_encode([$tab], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        header('Location: ../php_pages/user.php');
        exit();
    }
    echo "1";
    $content[] = $tab;
    file_put_contents($jsonFile, json_encode($content, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    header('Location: ../php_pages/user.php');
    exit();
}


if (isset($_POST["name"]) && isset($_POST["firstname"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["numero"])
&& isset($_POST["rue"]) && isset($_POST["rue"]) && isset($_POST["ville"]) && isset($_POST["cdp"]) && isset($_POST["birth"])) {
    date_default_timezone_set('Europe/Paris');
    session_unset();    
    session_destroy();
    $name = $_POST["name"];
    $firstname = $_POST["firstname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nb_rue = $_POST["numero"];
    $rue = $_POST["rue"];
    $ville = $_POST["ville"];
    $cdp = $_POST["cdp"];
    $birth = $_POST["birth"];
    inscription($name, $firstname, $email, $password, $nb_rue, $rue, $ville, $cdp, $birth);
    create_travel_user();
    
} else {
    header("Location: ../php_pages/inscription.php");
    exit();
}