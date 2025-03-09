<?php
session_start();

function find_user(){
    if (file_exists("../data/utilisateurs.csv")){
        $file = fopen("../data/utilisateurs.csv", "r");

        while( ($line = fgets($file)) !== false){
            $line = trim($line);
            $line = explode(";", $line);
            var_dump($line);
            if ($line[2] == $_SESSION['mail']){
                fclose($file);
                return $line;
            }
        }
        fclose($file);
        return false;
    }
}

function modification_line(){
    
    $line = find_user();
   
    if ($line != false){
        $line[0] = $_POST['forename'];
        $line[1] = $_POST['name'];
        $line[2] = $_POST['mail'];
        $line[3] = $_POST['mdp'];
        
        return $line;
    }
}

function write_file($line){
    if (file_exists("../data/utilisateurs.csv")){
        $file = fopen("../data/utilisateurs.csv", "r");
        $tab = array();
        $i = 0;
        while (($line1 = fgets($file)) !== false){
            $line1 = trim($line1);
            $line2 = explode(";", $line1);
            
            if ($line2[2] == $_SESSION['mail']){
                $tab[$i] = $line;
                $i++;
            } else {
                $tab[$i] = $line2;
                $i++;
            }
        }
        
        fclose($file);
        $file = fopen("../data/utilisateurs.csv", "w");
        foreach ($tab as $line){
            fputcsv($file, $line, ";");
        }
        fclose($file);
    }
}






if (isset($_POST['mail']) && isset($_POST['mdp']) && isset($_POST['forename']) && isset($_POST['name'])){

$mail = $_POST['mail'];
$mdp = $_POST['mdp'];
$forename = $_POST['forename'];
$name = $_POST['name'];


    $line = modification_line();

    write_file($line);

    exit();
}
?>