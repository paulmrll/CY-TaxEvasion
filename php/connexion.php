<?php

session_start();

function connexion($mail, $mdp){
    $file = fopen("../data/utilisateurs.csv", "r");
    if (file_exists("../data/utilisateurs.csv")){
        if (isset($mail) && isset($mdp)){

            while ($line = fgets($file)){
                $line = explode(";", $line);

                if ($line[2] == $mail){
                    if (password_verify($mdp, $line[3])){

                        $_SESSION['forename'] = $line[0];
                        $_SESSION['name'] = $line[1];
                        $_SESSION['mail'] = $line[2];
                        $_SESSION['mdp'] = $mdp;

                        header('Location: ../php_pages/user.php');
                        exit();
                    } else {
                        header('Location: ../php_pages/connexion.php');
                        exit();
                    }
                }
            }
        }
        header('Location: ../php_pages/connexion.php');
        exit();
    }
    header('Location: ../php_pages/connexion.php');
    exit();
}


if (isset($_POST['mail']) && isset($_POST['mdp'])){
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];

    connexion($mail, $mdp);

}


?>