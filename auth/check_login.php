<?php
    if(!isset($_SESSION)){
        session_start();
    }
    if((isset($_SESSION["user_connected"]))&&($_SESSION["user_connected"]==true)){
        // utilisateur connecté
        if((isset($_GET["loggout"]))&&($_GET["loggout"] == "true")){
            $_SESSION = array();
            session_destroy();
            header("location:login.php?pg=".$pg);
        }
    }else{
        // utilisateur pas connecté
        header("location:login.php?pg=".$pg);
    }
?>