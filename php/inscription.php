<?php

require "config.php";


function find($email, $pdo) {
    if (isset($email) && isset($pdo)){
        $sql1="SELECT COUNT(*) FROM `1` WHERE email = :email";
        $stmt1=$pdo->prepare($sql1);
        $stmt1->execute([
            ":email" => $email
        ]);
        $count=$stmt1->fetchColumn();
        if ($count > 0) {
            echo "Utilisateur déjà présent";
            exit();
        }
    } 
}

function modify($mail, $name, $firstname){
    $mail=strtolower($mail);
    for ($i = 0; $i < strlen($name); $i++){
        if ($i == 0){
            $name[$i] = strtoupper($name[$i]);
        } else {
            $name[$i] = strtolower($name[$i]);
        }
    }
    for ($j = 0; $j < strlen($firstname); $j++){
        if ($j == 0){
            $firstname[$j] = strtoupper($firstname[$j]);
        } else {
            $firstname[$j] = strtolower($firstname[$j]);
        }
    }
    $tab = [
        "mail" => $mail,
        "firstname" => $firstname,
        "name" => $name,
    ];
    return $tab;
}

$mdp=$_POST["mdp"];
$name=$_POST["name"];
$firstname=$_POST["firstname"];
$mail=$_POST["mail"];

$info = modify($mail, $name, $firstname);

$mail = $info["mail"];
$firstname = $info["firstname"];
$name = $info["name"];

echo $firstname .$name;


if (isset($mdp) && isset($name) && isset($firstname) && isset($mail)){
    find($mail, $pdo);
    $mdp_hash=password_hash($mdp, PASSWORD_DEFAULT);
    $sql="INSERT INTO `1` (name, firstname, email, mdp) VALUES (:name, :firstname, :mail, :mdp)";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([
        "name" => $name, 
        "firstname" => $firstname, 
        "mail" => $mail, 
        "mdp" => $mdp_hash
    ]);
    
    echo "inscription reussi";
}


?>