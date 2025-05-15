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
        switch ($hotel){
                case "5 étoiles":
                    $hotelIndex = 1;
                    break;
                case "5 étoiles premium":
                    $hotelIndex = 2;
                    break;
                case "5 étoiles Premium VIP":
                    $hotelIndex = 3;
                    break;
                case "5 étoiles Premium VIP Deluxe":
                    $hotelIndex = 4;
                    break;
                default:
                    $hotelIndex = 0;
                    break;
        }
        $basePrice = 0;
        for ($i = 0; $i < count($content); $i++) {
            if ($content[$i]['destination'] === $destination) {
                $basePrice = $content[$i]['prix'];
                break;
            }
        }
        $priceHotel = 1099;
        if ($loisir[0] == "1"){
            $nb_loisir = 0;
        } else {
            $nb_loisir = count($loisir);
        }
        if ($visite[0] == "1"){
            $nb_visite = 0;
        } else {
            $nb_visite = count($visite);
        }
        if ($relaxation[0] == "1"){
            $nb_relaxation = 0;
        } else {
            $nb_relaxation = count($relaxation);
        }
        $price_loisir = 5036;
        $price_visite = 4099;
        $price_relaxation = 2019;
        $departureDate = new DateTime($departure);
        $returnDate = new DateTime($return);
        $interval = $departureDate->diff($returnDate);
        $days = $interval->days;
        $montant = ($basePrice + $nb_loisir * $price_loisir + $nb_visite * $price_visite + $nb_relaxation * $price_relaxation + $hotelIndex * $priceHotel) * $days * $person;
        return $montant;
    } else {
        header('Location: ../php_pages/connexion.php');
        exit();
    }
    return  $nb_loisir;
}


?>