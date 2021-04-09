<?php
require 'connect.php';
$cost = 12;
$error = null;

session_start();

try {
    
    if(isset($_POST["button"])) {
        $login=$_POST['login'];
        $pass = $_POST['password'];
        /* ici mettre la vérification des entrées sanitize et validate LOGIN */

        /* ici mettre la vérification des entrées sanitize et validate PASSWORD */
        
        //crypte les mots de passe enregistrés
        $password=password_hash($_POST['password'], PASSWORD_DEFAULT, $cost);

        $sql ="SELECT user_login, user_password FROM user WHERE (login=:login);";
        $query= $pdo -> prepare($sql);
        $query-> bindParam(':login', $login, PDO::PARAM_STR);
        $query-> execute();

        $result = $query->fetch();

        if (password_verify($pass, $result->password)) {
            $_SESSION["login"] = $login;
            exit(header("location:read.php"));
        } else {
            echo "Invalid password";
        } 
    
    }

    } catch (PDOException $e) {
        $error = $e->getMessage();
        }


?>
