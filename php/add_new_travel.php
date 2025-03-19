<?php

require_once "../php/fonctions_utiles.php";







require_once "../php/fonctions_utiles.php";

function add_travel($destination, $hotel, $loisir, $visite, $relaxation) {
    $jsonFile = "../data/travel.json";
    
    // Correction de la mise en majuscule
    $destination = ucfirst(mb_strtolower($destination, 'UTF-8'));

    // Vérifier si le fichier existe, sinon le créer
    if (!file_exists($jsonFile)) {
        file_put_contents($jsonFile, json_encode([])); // Initialise un fichier JSON vide
    }

    // Lire et décoder le fichier JSON
    $content = json_decode(file_get_contents($jsonFile), true);

    // Vérifier que le contenu est bien un tableau
    if (!is_array($content)) { 
        $content = [];
    }

    // Vérifier si la destination existe déjà
    foreach ($content as $entry) {
        if ($entry['destination'] === $destination) {
            header('Location: ../php_pages/admin.php');
            exit();
        }
    }

    // Ajouter la nouvelle destination
    $content[] = [
        "destination" => $destination,
        "hotel" => $hotel,
        "loisir" => $loisir,
        "visite" => $visite,
        "relaxation" => $relaxation
    ];

    // Enregistrer les nouvelles données
    file_put_contents($jsonFile, json_encode($content, JSON_PRETTY_PRINT));

    // Redirection vers la page d'administration
    header('Location: ../php_pages/admin.php');
    exit();
}

// Vérifier que toutes les données du formulaire sont envoyées
if (isset($_POST['destination'], $_POST['hotel'], $_POST['loisir'], $_POST['visite'], $_POST['relaxation'])) {
    add_travel($_POST['destination'], $_POST['hotel'], $_POST['loisir'], $_POST['visite'], $_POST['relaxation']);
}



if (isset($_POST['destination']) && isset($_POST['hotel']) && isset($_POST['loisir']) && isset($_POST['visite']) && isset($_POST['relaxation'])) {
    add_travel($_POST['destination'], $_POST['hotel'], $_POST['loisir'], $_POST['visite'], $_POST['relaxation']);
    header('Location: ../php_pages/admin.php');

    exit();
}







?>