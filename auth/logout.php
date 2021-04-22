<?php
// démarrage de la session
session_start ();

// destruction des variables de notre session
session_unset ();

// destruction de notre session
session_destroy ();

// redirection du visiteur vers la main page
header ('location: index.php');
?>