<?php

use Router\Router;

require '../vendor/autoload.php';



define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

$router = new Router($_GET['url']);


$router->get('/', 'App\Controllers\UserController@home');
$router->get('/toto', 'App\Controllers\UserController@contact');

$router->get('/liste-facture', 'App\Controllers\FactureController@home');
try {
    $router->run();
} catch (Exception $e) {
    echo $e->getMessage();
}
