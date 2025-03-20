<?php

require_once "../php/fonctions_utiles.php";


function register_photo($file){
    if(isset($file)){
        $dossier = "../image/";
        if (!is_dir($dossier)){
            mkdir($dossier, 0777, true);
        } 
        $file_name = basename($file['name']);
        $name = $dossier . $file_name;
        move_uploaded_file($file['tmp_name'], $name);
        return $name;
    } else {
        return 0;
    }

}


function add_travel($name, $hotel, $loisir, $visite, $relaxation, $description, $photo, $photo_drapeau, $photo_carte) {
    $jsonFile = "../data/travel.json";
    
    $temp = explode(" ", $name);
    for ($i = 0; $i < count($temp); $i++){
        $temp[$i] = strtolower($temp[$i]);
        $temp[$i][0] = strtoupper($temp[$i][0]);
    }
    $destination = $temp[0];
    $name = implode(" ", $temp);
    for ($i = 0; $i < 3; $i++){
        switch($i){
            case 0:
                $photo_url = register_photo($photo);
                break;
            case 1:
                $photo_drapeau_url = register_photo($photo_drapeau);
                break;
            case 2:
                $photo_carte_url = register_photo($photo_carte);
                break;
            default :
                break;
        }
    }
    if ($photo_url == 0 || $photo_drapeau_url == 0 || $photo_carte_url == 0){
        header("Location: ../php_pages/add_new_travel.php");
        exit();
    }


    if (file_exists($jsonFile)) {
    $content = json_decode(file_get_contents($jsonFile), true);

    for ($i = 0; $i < count($content); $i++){
        if ($content[$i]['destination'] == $destination){
            header('Location: ../php_pages/admin.php');
            exit();
        }
    }

    $content[] = [
        "destination" => $destination,
        "name" => $name,
        "hotel" => $hotel,
        "loisir" => $loisir,
        "visite" => $visite,
        "relaxation" => $relaxation,
        "description" => $description,
        "image" => $photo_url,
        "image_maps" => $photo_carte_url,
        "image-flag" => $photo_drapeau_url
    ];

    file_put_contents($jsonFile, json_encode($content, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    header('Location: ../php_pages/admin.php');
    exit();
    } else {
        $content[] = [
            "destination" => $destination,
            "name" => $name,
            "hotel" => $hotel,
            "loisir" => $loisir,
            "visite" => $visite,
            "relaxation" => $relaxation,
            "description" => $description,
            "image" => $photo_url,
            "image_maps" => $photo_carte_url,
            "image-flag" => $photo_drapeau_url
        ];
    
        file_put_contents($jsonFile, json_encode($content, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        header('Location: ../php_pages/admin.php');
        exit();
    }

    
}




if (isset($_POST['destination']) && isset($_POST['hotel']) && isset($_POST['loisir']) && isset($_POST['visite']) && isset($_POST['relaxation'])
&& isset($_POST['description']) && isset($_FILES['photo']) && isset($_FILES['photo_drapeau']) && isset($_FILES['photo_carte'])) {
    add_travel($_POST['destination'], $_POST['hotel'], $_POST['loisir'], $_POST['visite'], $_POST['relaxation'], $_POST['description']
, $_FILES['photo'], $_FILES['photo_drapeau'], $_FILES['photo_carte']);
    header('Location: ../php_pages/admin.php');

    exit();
} else {
    header("Location: ../php_pages/add_new_travel");
    exit();
}

?>