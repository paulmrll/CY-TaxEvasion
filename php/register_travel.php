<?php
require_once "../php/fonctions_utiles.php";


function is_already_going_to($destination, $jsonFile){
    if (!file_exists($jsonFile)){
        header('Location: ../php/travel-user.php');
    }
    if (!isset($_SESSION["email"])){
        header('Location: ../php_pages/connexion.php');
    }
    $content = json_decode(file_get_contents($jsonFile), true);
    if ($content == null){
        header("Location= ../php_pages/connexion.php");
        exit();
    }
    for ($i = 0; $i < count($content); $i++){
        if ($content[$i]['email'] == $_SESSION["email"]){
            for ($j = 0; $j < count($content[$i]['travels']); $j++){
                if ($content[$i]['travels'][$j]['destination'] == $destination){
                    return 1;
                }
            }
        }
    }
    return 0;
}

function register_travel($destination, $hotel, $loisir, $visite, $relaxation, $departure, $return, $person){
    $jsonFile = "../data/travel-user.json";
    $prix = update_price($hotel, $loisir, $visite, $relaxation, $departure, $return, $person);
    if ($prix < 0){
        header('Location: ../php_pages/user_register_travel.php?destination=' . $destination);
    }
    if (!isset($_SESSION["email"])){
        header('Location: ../php_pages/connexion.php');
    }
    if (!file_exists($jsonFile)) {
        $tab[] = array(
            "email" => $_SESSION["email"],
            "travels" => array(
                array(
                    "destination" => $destination,
                    "hotel" => $hotel,
                    "loisir" => $loisir,
                    "visite" => $visite,
                    "relaxation" => $relaxation,
                    "departure" => $departure,
                    "return" => $return,
                    "reservation" => "Paiement en attente",
                    "prix" => $prix,
                    "transaction" => "0",
                    "person" => $person
                )
            )
    );
    file_put_contents($jsonFile, json_encode($tab, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        header('Location: ../php_pages/user.php');
    exit();
    }

    $content = json_decode(file_get_contents($jsonFile), true);
    if ($content == null){
        $tab[] = array(
                "email" => $_SESSION["email"],
                "travels" => array(
                    array(
                        "destination" => $destination,
                        "hotel" => $hotel,
                        "loisir" => $loisir,
                        "visite" => $visite,
                        "relaxation" => $relaxation,
                        "departure" => $departure,
                        "return" => $return,
                        "reservation" => "Paiement en attente",
                        "prix" => $prix,
                        "transaction" => "0",
                        "person" => $person
                    )
                )
        );
        file_put_contents($jsonFile, json_encode($tab, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            header('Location: ../php_pages/user.php');
        exit();
    }
    if (is_already_going_to($destination, $jsonFile) == 1){
        header("Location: ../php_pages/modification.php?travel=".$destination);
        exit();
    }
    for ($i = 0; $i < count($content); $i++){
        if ($content[$i]['email'] === $_SESSION["email"]){
            $content[$i]['travels'][] = array(
                        "destination" => $destination,
                        "hotel" => $hotel,
                        "loisir" => $loisir,
                        "visite" => $visite,
                        "relaxation" => $relaxation,
                        "departure" => $departure,
                        "return" => $return,
                        "reservation" => "Paiement en attente",
                        "prix" => $prix,
                        "transaction" => "0",
                        "person" => $person
            );
                

            file_put_contents($jsonFile, json_encode($content, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            header('Location: ../php_pages/user.php');
            exit();
        }
    }
    $content[] = array(
        "email" => $_SESSION["email"],
        "travels" => array(
            array(
                "destination" => $destination,
                "hotel" => $hotel,
                "loisir" => $loisir,
                "visite" => $visite,
                "relaxation" => $relaxation,
                "departure" => $departure,
                "return" => $return,
                "reservation" => "Paiement en attente",
                "prix" => $prix,
                "transaction" => "0",
                "person" => $person
            )
        )
);
    file_put_contents($jsonFile, json_encode($content, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    header('Location: ../php_pages/user.php');
    exit();
}





if (isset($_POST['destination']) && isset($_POST['hotel']) && isset($_POST['loisir']) && isset($_POST['visite']) && 
isset($_POST['relaxation']) && isset($_POST['departure']) && isset($_POST['return']) && isset($_POST['person'])){
    if (!isset($_SESSION['email'])){
        header('Location: ../php_pages/connexion.php');
        exit();
    }
    $destination = $_POST['destination'];
    $hotel = $_POST['hotel'];
    $loisir = $_POST['loisir'];
    $visite = $_POST['visite'];
    $relaxation = $_POST['relaxation'];
    $departure = $_POST['departure'];
    $return = $_POST['return'];
    $person = $_POST['person'];
    if ($departure < date("Y-m-d") || $return < date("Y-m-d") || $return < $departure){
        header('Location: ../php_pages/user_register_travel.php?destination='.$destination);
        exit();
    }
    register_travel($destination, $hotel, $loisir, $visite, $relaxation, $departure, $return, $person);
} else {
    echo "All fields are required";
}


?>