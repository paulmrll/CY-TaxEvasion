<?php
session_start();

function user_modification($mail, $mdp, $firstname, $name){
    if (file_exists("../data/utilisateurs.json")){
       $content = json_decode(file_get_contents("../data/utilisateurs.json"), true);

       if (isset($content)){
            for ($i = 0; $i < count($content); $i++){
                if ($content[$i]['email'] === $_SESSION['mail']){
                    $content[$i]['name'] = $name;
                    $content[$i]['firstname'] = $firstname;
                    $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
                    $content[$i]['mdp'] = $mdp_hash;
                    $content[$i]['email'] = $mail;
                    file_put_contents("../data/utilisateurs.json", json_encode($content, JSON_PRETTY_PRINT));
                    $_SESSION['mail'] = $mail;
                    $_SESSION['name'] = $name;
                    $_SESSION['firstname'] = $firstname;
                    $_SESSION['mdp'] = $mdp;
                    $_SESSION['role'] = $content[$i]['role'];
                    header('Location: ../php_pages/user.php');
                    exit();
                }
            }
            session_destroy();
            header('Location: ../php_pages/connexion.php');
            exit();
       } else {
        return false;
       }
    }
}


if (isset($_POST['mail']) && isset($_POST['mdp']) && isset($_POST['firstname']) && isset($_POST['name'])){
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $firstname = $_POST['firstname'];
    $name = $_POST['name'];
    
    user_modification($mail, $mdp, $firstname, $name);
}
?>