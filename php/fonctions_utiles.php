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

function update_price($hotel, $loisir, $visite, $relaxation, $departure, $return){
    $departure = new DateTime($departure);
    $return = new DateTime($return);
    $base_price = 18000;
    $option_loisir = 5036;
    $option_relaxation = 2019;
    $option_visite = 4099;
    $price_per_day = 1099;
    $surclassement_hotel = 1002;

    $nb_loisirs = count($loisir);
    $nb_relaxation = count($relaxation);
    $nb_hotel = explode(" ",$hotel);
    $nb_hotel = count($nb_hotel) - 3;
    $nb_visite = count($visite);
    $diff = $departure->diff($return);
    if ($diff->days > 10){
        $price_day = ($diff->days - 10)*$price_per_day;
    } else{
        $price_day = 1;
    }
    return $base_price + $nb_loisirs * $option_loisir + $nb_relaxation * $option_relaxation + $nb_visite * $option_visite + $price_day
    * $nb_hotel * $surclassement_hotel;
}

?>