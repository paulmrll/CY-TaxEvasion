<?php
session_start();
function give($destination){
    $jsonFile = "../data/travel.json";
    if (!file_exists($jsonFile)) {
        exit();
    }

    $content = json_decode(file_get_contents($jsonFile), true);
    if ($content == null) {
        exit();
    }
    $check_visite = [];
    $check_loisir = [];
    $check_relaxation = [];
    $hotel_list = [];
    for ($i = 0; $i < count($content); $i++) {
        if ($content[$i]['destination'] === $destination) {
            for ($j = 0; $j < count($content[$i]['visite']); $j++) {
                $check_visite[] = $content[$i]['visite'][$j];
            }
            for ($j = 0; $j < count($content[$i]['hotel']); $j++) {
                $hotel_list[] = $content[$i]['hotel'][$j];
            }
            for ($j = 0; $j < count($content[$i]['relaxation']); $j++) {
                $check_relaxation[] = $content[$i]['relaxation'][$j];
            }
            for ($j = 0; $j < count($content[$i]['loisir']); $j++) {
                $check_loisir[] = $content[$i]['loisir'][$j];
            }
        }
    }
    $tab = [
        "visite" => $check_visite,
        "loisir" => $check_loisir,
        "relaxation" => $check_relaxation,
        "hotel" => $hotel_list
    ];
    return $tab;
}
function give2($destination, $person){
    $jsonFile = "../data/travel-user.json";
    if (!file_exists($jsonFile)) {
        exit();
    }

    $content = json_decode(file_get_contents($jsonFile), true);
    if ($content == null) {
        exit();
    }
    $check_visite = [];
    $check_loisir = [];
    $check_relaxation = [];
    $hotel_list = [];
    for ($i = 0; $i < count($content); $i++) {
        if ($content[$i]['email'] === $person) {
            for ($j = 0; $j < count($content[$i]['travels']); $j++) {
                if ($content[$i]['travels'][$j]['destination'] === $destination) {
                    for ($k = 0; $k < count($content[$i]['travels'][$j]['visite']); $k++) {
                        $check_visite[] = $content[$i]['travels'][$j]['visite'][$k];
                    }
                    $hotel_list[] = $content[$i]['travels'][$j]['hotel'];
                    for ($k = 0; $k < count($content[$i]['travels'][$j]['relaxation']); $k++) {
                        $check_relaxation[] = $content[$i]['travels'][$j]['relaxation'][$k];
                    }
                    for ($k = 0; $k < count($content[$i]['travels'][$j]['loisir']); $k++) {
                        $check_loisir[] = $content[$i]['travels'][$j]['loisir'][$k];
                    }
                }
            }
        }
    }
    $tab = [
        "visite" => $check_visite,
        "loisir" => $check_loisir,
        "relaxation" => $check_relaxation,
        "hotel" => $hotel_list
    ];
    return $tab;
}
if (isset($_GET['todo'])){
    echo json_encode(give2($_GET['destination'], $_GET['todo']));
    exit();
} else {
    $destination = $_GET['destination'];
    echo json_encode(give($destination));
    exit();
}










?>