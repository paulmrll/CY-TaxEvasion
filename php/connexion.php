<?php

session_start();

function change_connexionDate(){
    if (file_exists("../data/utilisateurs.json")){
        $content = json_decode(file_get_contents("../data/utilisateurs.json"), true);
        for ($i = 0; $i < count($content); $i++){
            if ($content[$i]['email'] === $_SESSION['mail']){
                $content[$i]['connexion_date'] = date("d-m-Y H:i:s");
                break;
            }
        }
        file_put_contents("../data/utilisateurs.json", json_encode($content, JSON_PRETTY_PRINT));
    }
    
}
function connexion($mail, $mdp){
    if (file_exists("../data/utilisateurs.json")){
        if (isset($mail) && isset($mdp)){
            if (file_exists("../data/utilisateurs.json")){
                $content = json_decode(file_get_contents("../data/utilisateurs.json"), true);
                var_dump($content);
                for ($i = 0; $i < count($content); $i++){
                    if ($content[$i]['email'] === $mail){
                        if (password_verify($mdp, $content[$i]['mdp'])){
                            $_SESSION['firstname'] = $content[$i]['firstname'];
                            $_SESSION['name'] = $content[$i]['name'];
                            $_SESSION['mail'] = $content[$i]['email'];
                            $_SESSION['mdp'] = $mdp;
                            change_connexionDate();
                            header('Location: ../php_pages/user.php');
                            exit();
                        } else {
                            header('Location: ../php_pages/connexion.php');
                            exit();
                        }
                    }
                }
                header('Location: ../php_pages/inscription.php');
                exit();
            }
        }


    }


}


if (isset($_POST['mail']) && isset($_POST['mdp'])){
    date_default_timezone_set('Europe/Paris');
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];

    connexion($mail, $mdp);

}


?>