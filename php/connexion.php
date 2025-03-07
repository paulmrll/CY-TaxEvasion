<?php
function connexion($mail, $mdp){
    echo "1";
    $file = fopen("../data/utilisateurs.csv", "r");
    if (file_exists("../data/utilisateurs.csv")){
        echo "1";
        if (isset($mail) && isset($mdp)){
            while (!feof($file)){
                $line = fgets($file);
                $line = explode(";", $line);
                if ($line[2] == $mail){
                    echo $line[2] . $line[3];

                    
                    if (password_verify($mdp, $line[3])){

                        echo "Connexion réussie";
                        session_start();
                        header('Location: ../index.php');
                        return true;
                    } else {
                        echo "1";
                        return false;
                    }
                
                }
            }
        }
    }
}
if (isset($_POST['mail']) && isset($_POST['mdp'])){
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];

        connexion($mail, $mdp);
    
}
?>