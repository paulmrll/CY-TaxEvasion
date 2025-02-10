<?php
require "config.php";


function exist($mail, $pdo){
    $sql_exist = "SELECT COUNT(*) FROM `1` WHERE email = :mail";
    $stmt_exist = $pdo->prepare($sql_exist);
    $stmt_exist->execute([
        ":mail" => $mail
    ]);

    $count_exist = $stmt_exist->FetchColumn();
    if ($count_exist > 0){

    } else {
        echo "utilisateurs introuvable";
        exit();
    }
}

function delete($mail, $pdo){
    $sqldelete = "DELETE FROM `1` WHERE email = :mail";
    $stmt1 = $pdo->prepare($sqldelete);
    $stmt1->execute([
        ":mail" => $mail
    ]);
}

function modify($mail){
    return strtolower($mail);
}


$mail = $_POST["mail"];
$mdp = $_POST["mdp"];
$mail= modify($mail);
echo $mail;



if (isset($mdp) && isset($mail)){
    exist($mail, $pdo);
    $sql = "SELECT * FROM `1` WHERE email= :mail";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":mail" => $mail
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($mdp, $user["mdp"])){
        echo "connexion réussi";
    } else {
        echo "mauvais mdp ou email";
    }
} else {
    echo "mdp ou mail incorrect";
}
?>