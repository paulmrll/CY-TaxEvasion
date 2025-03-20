<?php
require_once "../php/fonctions_utiles.php";




function modification_travel($destination, $hotel, $loisir, $visite, $relaxation, $departure, $return){
    $prix = update_price($hotel, $loisir, $visite, $relaxation, $departure, $return);
    if ($prix < 0){
        header('Location: ../php_pages/user_register_travel.php?destination=' . $destination);
    }
    if ($departure > $return || $return < $currentDate || $departure < $currentDate){
        header('Location: ../php_page/modification.php?travel='.$destination);
    }
    $jsonFile = "../data/travel-user.json";
    if (!file_exists($jsonFile)) {
        header('Location: ../php/inscription.php');
    }
    if (!isset($_SESSION['email'])) {
        header("Location: ../php_pages/connexion.php");
        exit();
    }

    $content = json_decode(file_get_contents($jsonFile), true);
    if ($content == null){
        header('Location: ../php_pages/inscription.php');
        exit();
    }
    for ($i = 0; $i < count($content); $i++){
        if ($content[$i]["email"] == $_SESSION['email']){
            for ($o = 0; $o < count($content[$i]["travels"]); $o++){
                if ($content[$i]["travels"][$o]["destination"] === $destination){
                    $content[$i]["travels"][$o]["hotel"] = $hotel;
                    $content[$i]["travels"][$o]["visite"] = $visite;
                    $content[$i]["travels"][$o]["relaxation"] = $relaxation;
                    $content[$i]["travels"][$o]["departure"] = $departure;
                    $content[$i]["travels"][$o]["return"] = $return;
                    $content[$i]["travels"][$o]["loisir"] = $loisir;
                    $content[$i]["travels"][$o]["prix"] = $prix;
                    file_put_contents($jsonFile, json_encode($content, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                    header("Location: ../php_pages/user.php");
                    exit();
                }
            }
            header("Location: ../php_pages/user.php");
            exit();
        }
    }
    header("Location: ../php_pages/user.php");
    exit();
}
function delete_travel($destination){
    $jsonFile = "../data/travel-user.json";
    if (!file_exists($jsonFile)) {
        header('Location: ../php_pages/destination.php');
    }
    if (!isset($_SESSION['email'])) {
        header("Location: ../php_pages/connexion.php");
        exit();
    }
    $content = json_decode(file_get_contents($jsonFile), true);
    if ($content == null){
        header('Location: ../php_pages/destination.php');
        exit();
    }
    for ($i = 0; $i < count($content); $i++){
        if ($content[$i]["email"] == $_SESSION['email']){
            for ($o = 0; $o < count($content[$i]["travels"]); $o++){
                if ($content[$i]["travels"][$o]["destination"] === $destination){
                    unset($content[$i]["travels"][$o]);
                    file_put_contents($jsonFile, json_encode($content, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                    echo "1";
                }
            }
            header("Location: ../php_pages/user.php");
            exit();
        }
    }
    
}





if (isset($_POST['todo'])) {
    switch ($_POST['todo']){
        case "modify":
            if (isset($_POST['destination']) && isset($_POST['hotel']) && isset($_POST['loisir']) && isset($_POST['visite']) && 
            isset($_POST['relaxation']) && isset($_POST['departure']) && isset($_POST['return'])) {
                $destination = $_POST['destination'];
                $hotel = $_POST['hotel'];
                $loisir = $_POST['loisir'];
                $visite = $_POST['visite'];
                $relaxation = $_POST['relaxation'];
                $departure = $_POST['departure'];
                $return = $_POST['return'];
                echo "1";
            modification_travel($destination, $hotel, $loisir, $visite, $relaxation, $departure, $return);
            } else {
                header('Location: ../php_pages/modification.php');
                exit();
            }
            break;
        case "delete":
            if (isset($_POST['destination'])) {
                $destination = $_POST['destination'];
                delete_travel($_POST['destination']);
            } else {
                header('Location: ../php_pages/modification.php');
                exit();
            }
            break;
        default:
            header('Location: ../php_pages/user.php');
            exit();
    }

} else {
    header('Location: ../php_pages/modification.php');
    exit();
}


?>







?>