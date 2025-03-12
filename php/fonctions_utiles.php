<?php

session_start();
function change_variable($var){
    for ($i = 0; $i < strlen($var); $i++) {
        if ($i == 0) {
            $var[$i] = strtoupper($var[$i]);
        } else {
            $var[$i] = strtolower($var[$i]);
        }
    }
    return $var;
}
function change_email($email){
    $email = strtolower($email);
    return $email;
}
function change_connexionDate(){
    if (file_exists("../data/utilisateurs.json")) {
        $content = json_decode(file_get_contents("../data/utilisateurs.json"), true);
        for ($i = 0; $i < count($content); $i++) {
            if ($content[$i]['email'] === $_SESSION['email']) {
                $content[$i]['connexion_date'] = date("d-m-Y H:i:s");
                break;
            }
        }
        file_put_contents("../data/utilisateurs.json", json_encode($content, JSON_PRETTY_PRINT));
    }
}
function start_session($mail, $name, $firstname, $password, $role){
    $_SESSION['firstname'] = $firstname;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $mail;
    $_SESSION['password'] = $password;
    $_SESSION['role'] = $role;
}

?>