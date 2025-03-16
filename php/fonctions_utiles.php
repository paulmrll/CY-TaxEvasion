<?php

session_start();
function change_variable($var){
    for ($i = 0; $i < strlen($var); $i++) {
        if ($i == 0) {
            $var[$i] = strtoupper($var[$i]);
        } else {
            $var[$i] = strtolower($var[$i]);
        }
    }
    return $var;
}
function change_email($email){
    $email = strtolower($email);
    return $email;
}
function change_connexionDate(){
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
function find_user(){
    if (file_exists("../data/utilisateurs.json")) {
            $content = json_decode(file_get_contents("../data/utilisateurs.json"), true);
            if ($content === null){
                header('Location: ../php_pages/inscription.php');
                exit();
            }
            for ($i = 0; $i < count($content); $i++) {
                if ($content[$i]['email'] === $_SESSION['email']) {
                    return $i;
                }
            }
            header('Location: ../php_pages/inscription.php');
            exit();
    } else {
        header('Location: ../php_pages/inscription.php');
        exit();
    }
} 

function start_session($mail, $name, $firstname, $password, $role){
    $_SESSION['firstname'] = $firstname;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $mail;
    $_SESSION['password'] = $password;
    $_SESSION['role'] = $role;
}
function get_url($destination){
    switch ($destination){
        case "Anguilla":
            $name = "Anguilla";
            $url =  "../php_pages/anguilla.php";
            $url_image = "../image/anguilla.jpg";
            break;
        case "Panama":
            $name = "Le Panama";
            $url = "../php_pages/panama.php";
            $url_image = "../image/le-panama.jpg";
            break;
        case "Fidji":
            $name = "Les Fidji";
            $url = "../php_pages/fidji.php";
            $url_image = "../image/les-fidji.jpeg"; 
            break;
        case "Palaos":
            $name = "Les Palaos";
            $url = "../php_pages/les-palaos.php";
            $url_image = "../image/les-palaos.jpg";
            break;
        case "Antigua":
            $name = "Antigua";
            $url =  "../php_pages/antigua-barbuda.php";
            $url_image = "../image/antigua-et-barbuda.jpg";
            break;
        case "Samoa":
            $name = "Samoa";
            $url =  "../php_pages/samoa-americaine.php";
            $url_image = "../image/les-samoa-americaine.jpeg";
            break;
        case "malte":
            $name = "Malte";
            $url =  "../php_pages/malte.php";
            $url_image = "../image/malte.jpg";
            break;
        case "monaco":
            $name = "Monaco";
            $url =  "../php_pages/monaco.php";
            $url_image = "../image/monaco.jpeg";
            break;
        case "chypre":
            $name = "Chypre";
            $url =  "../php_pages/chypre.php";
            $url_image = "../image/chypre.jpeg";
            break;
        case "caimans":
            $name = "Caïmans";
            $url =  "../php_pages/caimans.php";
            $url_image = "../image/caimans.jpg";
            break;
        case "bermudes":
            $name = "Bermudes";
            $url =  "../php_pages/bermudes.php";
            $url_image = "../image/bermudes.jpg";
            break;
        case "eau":
            $name = "Émirats arabes unis";
            $url =  "../php_pages/EAU.php";
            $url_image = "../image/EAU.jpg";
            break;
        default:
            $name = "Destination inconnue";
            $url =  "../php_pages/inscription.php";
            $url_image = "../image/destination-inconnue.jpg";
            break;
    }
    $infos = array($name, $url, $url_image);
    return $infos;
}
?>