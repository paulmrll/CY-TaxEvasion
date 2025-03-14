<?php
session_start();

function register_travel($destination, $hotel, $loisir, $visite, $relaxation, $departure, $return){
    $jsonFile = "../data/utilisateurs.json";
    if (!file_exists($jsonFile)) {
        header('Location: ../php/inscription.php');
    }

    $content = json_decode(file_get_contents($jsonFile), true);
    if ($content == null){
        header('Location: ../php_pages/inscription.php');
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
                "reservation" => "paiement en attente"
            );
            file_put_contents($jsonFile, json_encode($content, JSON_PRETTY_PRINT));
            header('Location: ../php_pages/user.php');
        }
    }
}





if (isset($_POST['destination']) && isset($_POST['hotel']) && isset($_POST['loisir']) && isset($_POST['visite']) && 
isset($_POST['relaxation']) && isset($_POST['departure']) && isset($_POST['return'])){
    $destination = $_POST['destination'];
    $hotel = $_POST['hotel'];
    $loisir = $_POST['loisir'];
    $visite = $_POST['visite'];
    $relaxation = $_POST['relaxation'];
    $departure = $_POST['departure'];
    $return = $_POST['return'];
    register_travel($destination, $hotel, $loisir, $visite, $relaxation, $departure, $return);
} else {
    echo "All fields are required";
}


?>