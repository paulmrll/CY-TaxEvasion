<?php


function supprimer($mail){
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
                    file_put_contents("../data/utilisateurs.json", json_encode($content, JSON_PRETTY_PRINT));
                    session_destroy();
                    header('Location: ../php_pages/admin.php');
                    exit();
                }
            }
        }
    }
}


if (isset($_POST['email'])){
    $mail = $_POST['email'];
    supprimer($mail);
}
?>