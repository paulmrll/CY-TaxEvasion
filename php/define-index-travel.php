<?php

session_start();
if(isset($_GET['action']) && isset($_GET['travel'])){
    switch ($_GET['action']){
        case "modify":
            header('Location: ../php_pages/modification.php?travel='.$_GET['travel']);
            exit();
            break;
        case "delete":
            header('Location: ../php_pages/delete.php');
            exit();
            break;
        case "see" :
            header('Location: ../php_pages/travel-information.php?travel='.$_GET['travel']);
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