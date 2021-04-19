<?php

use Router\Router;

require '../vendor/autoload.php';



define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

$router = new Router($_GET['url']);

$router->get('/', 'App\Controllers\UserController@home');
$router->get('/toto', 'App\Controllers\UserController@contact');


$router->get('/listeContact', 'App\Controllers\ContactController@listeContact');
$router->get('/listeContact/:id', 'App\Controllers\ContactController@detailContact');


try {
    $router->run();
} catch (Exception $e) {
    echo $e->getMessage();
}
