<?php
function exist($email){
    $file = fopen("../data/utilisateurs.csv", "r");
    if (file_exists("../data/utilisateurs.csv")){
        while (!feof($file)){
            $line = fgets($file);
            $line = explode(";", $line);
            if ($line[2] == $email){
                return true;
            }
        }
    }
    return false;
}

function inscription($nom, $prenom, $email, $mdp){
    echo "1";
    $file = fopen("../data/utilisateurs.csv", "a");
   
    if (file_exists("../data/utilisateurs.csv")){
        if (isset($nom) && isset($prenom) && isset($email) && isset($mdp)){
            if (exist($email)){
                echo "Cet email est déjà utilisé";
                return;
            } else {
                $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
                $line = $nom . ";" . $prenom . ";" . $email . ";" . $mdp_hash .";" . "\n";
                fwrite($file, $line);
            }
        } 
    }
    fclose($file);
}


echo "1";
$nom = $_POST["name"];
$prenom = $_POST["firstname"];
$email = $_POST["email"];
$mdp = $_POST["mdp"];

inscription($nom, $prenom, $email, $mdp);





    
?>