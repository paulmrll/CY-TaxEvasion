<?php


function supprimer_user($mail){
    if (file_exists("../data/utilisateurs.json")){
        $content = json_decode(file_get_contents("../data/utilisateurs.json"), true);
        if ($content === null){
            header('Location: ../php_pages/inscription.php');
            exit();
        }
        if (isset($content)){
            for ($i = 0; $i < count($content); $i++){
                if ($content[$i]['email'] === $mail){
                    unset($content[$i]);
                    $content = array_values($content);
                    file_put_contents("../data/utilisateurs.json", json_encode($content, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                    session_destroy();
                    header('Location: ../php_pages/admin.php');
                    exit();
                }
            }
        }
    }
}

function supprimer_travel($destination){
    $file = "../data/travel.json";
    if (!file_exists($file)){
        header("Location: ../php_pages/admin.php");
        exit();
    }
    $content = json_decode(file_get_contents($file), true);
    if ($content == null || !isset($content)){
        header("Location: ../php_pages/admin.php");
        exit();
    }
    for ($i = 0; $i < count($content); $i++){
        if ($content[$i]['destination'] == $destination){
            unset($content[$i]);
            $content = array_values($content);
            file_put_contents($file, json_encode($content, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            header("Location: ../php_pages/admin.php");
            exit();
        }
    }
}

if (isset($_POST['action'])){
    if($_POST['action'] == "delete"){
        $mail = $_POST['email'];
        supprimer_user($mail);
        header("Location: ../php_pages/admin.php");
        exit();
    } else if ($_POST['action'] == "delete-travel") {
        $destination = $_POST['travel'];
        supprimer_travel($destination);
        header("Location: ../php_pages/admin.php");
        exit();
    }
    
}
?>