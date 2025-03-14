<?php

session_start();
if(isset($_POST['index-travel']) && isset($_POST['todo'])){
    $_SESSION['index-travel'] = $_POST['index-travel'];
    switch ($_POST['todo']){
        case "modify":
            header('Location: ../php_pages/modification.php');
            exit();
            break;
        case "delete":
            header('Location: ../php_pages/delete.php');
            exit();
            break;
        case "see" :
            header('Location: ../php_pages/travel-information.php');
            exit();
        default:
            header('Location: ../php_pages/user.php');
            exit();
            break;
    }
    
} else {
    header('Location: ../php_pages/user.php');
}

?>