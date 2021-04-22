<?php
// vérifie la correspondance des mots de passe
$pass = $_POST['password'];
$cost = 12;
//$password = password_hash($pass, PASSWORD_DEFAULT);
$password=password_hash($pass, PASSWORD_DEFAULT,$cost);
$pass_hash = password_hash($pass,PASSWORD_DEFAULT,$cost);
if (password_verify($pass, $pass_hash)) {
    echo "Mot de passe correct.";
} else {
    echo "Mot de passe incorrect.";
}
?>