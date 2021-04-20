<?php

use Router\Router;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

$router = new Router($_GET['url']);

$router->get('/', 'App\Controllers\UserController@home');
$router->get('/toto', 'App\Controllers\UserController@contact');

$router->get('/liste-facture', 'App\Controllers\FactureController@home');

$router->get('/annuaire', 'App\Controllers\SocietiesController@annuaire');
$router->get('/annuaire/:id', 'App\Controllers\SocietiesController@details');
// $router->get('/annuaire/delete-company/:id', 'App\Controllers\SocietiesController@delete_infos_company');

try {
    $router->run();
} catch (Exception $e) {
    echo $e->getMessage();
}