<?php
require 'connectbd.php';
$cost = 12;
$error = null;
$msg='';
$valid = true;
session_start();

try {
    
    if(isset($_POST['button'])) {

        // vérification (sanitize et validate) des entrées LOGIN
        if (isset($_POST['login'])) {
            $login = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
            //garde uniquement les lettres
            $patternlogin = "/^[a-zA-Z -',áàâäãåçñéèêëíìîïóòôöõúùûüýÿæœÁÀÂÄÃÅÇÑÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜÝŸÆŒ]*$/";
            preg_match($patternlogin, $login);
            //fin de regex
            if (!preg_match($patternlogin, $login)) {
                $msg = "Mauvaise entrée";
                $valid = false;
                }
            }

        // vérification (sanitize et validate) des entrées PASSWORD
        if (isset($_POST['password'])) {
            $pass = $_POST['password'];
            //crypte les mots de passe enregistrés
            $passHash=password_hash($pass, PASSWORD_DEFAULT, $cost);
            }

        $sql ="SELECT user_login, user_password FROM user WHERE (login=:login);";
        $query= $pdo -> prepare($sql);
        $query-> bindParam(':login', $login, PDO::PARAM_STR);
        $query-> execute();

        $result = $query->fetch();

        if (password_verify($passHash, $result->password)) {
            $_SESSION['login'] = $login;
            exit(header('location:index.php')); // la page où on était avant
            } else {
                echo "Mot de passe invalide";
                }
    
        }

    } catch (PDOException $e) {
        $error = $e->getMessage();
        }

?>
