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
        file_put_contents("../data/utilisateurs.json", json_encode($content, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
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

function calculate_price($destination, $hotel, $loisir, $visite, $relaxation, $departure, $return, $person){
    if (isset($_SESSION['email'])) {
        $jsonFile = "../data/travel.json";
        if (!file_exists($jsonFile)) {
            header('Location: ../php_pages/user_register_travel.php?destination=' . $destination);
            exit();
        }
        $content = json_decode(file_get_contents($jsonFile), true);
        if ($content == null) {
            header('Location: ../php_pages/user_register_travel.php?destination=' . $destination);
            exit();
        }

        
        $basePrice = 0;
        $price_loisir = 0;
        $price_visite = 0;
        $price_relaxation = 0;
        $priceHotel = 0;
        for ($i = 0; $i < count($content); $i++) {
            if ($content[$i]['destination'] === $destination) {
                $basePrice = $content[$i]['prix'];
                if ($loisir[0] == "1"){
                    $price_loisir = 0;
                } else {
                    for ($j = 0; $j < count($loisir); $j++){
                        if (in_array($loisir[$j], $content[$i]['loisir'] )){
                            $price_loisir += $content[$i]['price_option'][$loisir[$j]];
                        }
                    }
                }
                if ($visite[0] == "1"){
                    $price_visite = 0;
                } else {
                    for ($j = 0; $j < count($visite); $j++){
                        if (in_array($visite[$j], $content[$i]['visite'] )){
                            $price_visite += $content[$i]['price_option'][$visite[$j]];
                        }
                    }
                }
                if ($relaxation[0] == "1"){
                    $price_relaxation = 0;
                } else {
                    for ($j = 0; $j < count($relaxation); $j++){
                        if (in_array($relaxation[$j], $content[$i]['relaxation'] )){
                            $price_relaxation += $content[$i]['price_option'][$relaxation[$j]];
                        }
                    }
                }
                if ($hotel[0] == "1"){
                    $priceHotel = 0;
                } else {
                    if (in_array($hotel, $content[$i]['hotel'])){
                        $priceHotel = $content[$i]['price_hotel'][$hotel];
                    }
                }
                break;
            }
        }
        $departureDate = new DateTime($departure);
        $returnDate = new DateTime($return);
        $interval = $departureDate->diff($returnDate);
        $days = $interval->days;
        $montant = ($basePrice + $price_loisir + $price_visite + $price_relaxation + $priceHotel) * $days * $person;
        return $montant;
    } else {
        header('Location: ../php_pages/connexion.php');
        exit();
    }
    return  $nb_loisir;
}


?>