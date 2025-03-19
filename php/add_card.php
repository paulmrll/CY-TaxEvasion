<?php
session_start();
function add_card($name, $card, $date, $cvv){
    $jsonFile = "../data/utilisateurs.json";
    if (!file_exists($jsonFile)) {
        exit("Erreur : Le fichier json n'existe pas");
        header('Location: ../php/inscription.php');
    }

    $content = json_decode(file_get_contents($jsonFile), true);
    if ($content == null){
        header('Location: ../php_pages/inscription.php');
        exit();
    }
    for ($i = 0; $i < count($content); $i++){
        if ($content[$i]['email'] === $_SESSION['email']){
            $content[$i]['card']['name'] = $name;
            $content[$i]['card']['number'] = $card;
            $content[$i]['card']['date'] = $date;
            $content[$i]['card']['cvv'] = $cvv;
            file_put_contents($jsonFile, json_encode($content, JSON_PRETTY_PRINT));
        }
    }
    header('Location: ../php/inscription.php');
}
    

if (isset($_POST['name']) &&isset($_POST['card']) && isset($_POST['date']) && isset($_POST['cvv'])) {
    $name = $_POST['name'];
    $card = $_POST['card'];
    $date = $_POST['date'];
    $cvv = $_POST['cvv'];
    if (strlen($card) != 16 || strlen($cvv) != 3 || ($date < Date('Y-m-d'))){
        header('Location: ../php_pages/add_card.php');
        exit();
    }

    add_card($name, $card, $date, $cvv);

    header('Location: ../php_pages/user.php');
    exit();
}
?>