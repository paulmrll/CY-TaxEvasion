<?php
require_once "../php/fonctions_utiles.php";




function modification_travel($destination, $hotel, $loisir, $visite, $relaxation, $departure, $return){
    $jsonFile = "../data/utilisateurs.json";
    if (!file_exists($jsonFile)) {
        header('Location: ../php/inscription.php');
    }
    if (!isset($_SESSION['email']) || !isset($_SESSION['index-travel'])) {
        header("Location: ../php_pages/connexion.php");
        exit();
    }

    $content = json_decode(file_get_contents($jsonFile), true);
    if ($content == null){
        header('Location: ../php_pages/inscription.php');
        exit();
    }
    $i = find_user();
        if ($content[$i]['email'] === $_SESSION["email"]){
            $content[$i]['travels'][$_SESSION['index-travel']]["destination"] = $destination;
            $content[$i]['travels'][$_SESSION['index-travel']]["hotel"] = $hotel;
            $content[$i]['travels'][$_SESSION['index-travel']]["loisir"] = $loisir;
            $content[$i]['travels'][$_SESSION['index-travel']]["visite"] = $visite;
            $content[$i]['travels'][$_SESSION['index-travel']]["relaxation"] = $relaxation;
            $content[$i]['travels'][$_SESSION['index-travel']]["departure"] = $departure;
            $content[$i]['travels'][$_SESSION['index-travel']]["return"] = $return;
            file_put_contents($jsonFile, json_encode($content, JSON_PRETTY_PRINT));
            header('Location: ../php_pages/user.php');
    }
}
function delete_travel(){
    $jsonFile = "../data/utilisateurs.json";
    if (!file_exists($jsonFile)) {
        header('Location: ../php/inscription.php');
    }
    if (!isset($_SESSION['email']) || !isset($_SESSION['index-travel'])) {
        header("Location: ../php_pages/connexion.php");
        exit();
    }
    $content = json_decode(file_get_contents($jsonFile), true);
    if ($content == null){
        header('Location: ../php_pages/inscription.php');
        exit();
    }
    $i = find_user();
    if ($content[$i]['email'] === $_SESSION["email"]){
        unset($content[$i]['travels'][$_SESSION['index-travel']]);
        file_put_contents($jsonFile, json_encode($content, JSON_PRETTY_PRINT));
        header('Location: ../php_pages/user.php');
        exit();
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
            modification_travel($destination, $hotel, $loisir, $visite, $relaxation, $departure, $return);
            } else {
                header('Location: ../php_pages/inscription.php');
                exit();
            }
            break;
        case "delete":
            delete_travel();
            break;
        default:
            header('Location: ../php_pages/user.php');
    }

} else {
    header('Location: ../php_pages/inscription.php');
    exit();
}


?>







?>