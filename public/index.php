<?php

use Router\Router;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);





// $router->get('/annuaire/delete-company/:id', 'App\Controllers\SocietiesController@delete_infos_company');
$router = new Router($_GET['url']);

$router->get('/', 'App\Controllers\UserController@home');
$router->get('/toto', 'App\Controllers\UserController@contact');


// Romain
$router->get('/listeContact', 'App\Controllers\ContactController@listeContact');
$router->get('/listeContact/:id', 'App\Controllers\ContactController@detailContact');
$router->get('/newContact', 'App\Controllers\ContactController@newContact');
$router->post('/newContact', 'App\Controllers\ContactController@newContactPost');
$router->get('/deleteContact/:id', 'App\Controllers\ContactController@deleteContact');
/* Fred : concerne les factures (invoice) */
$router->get('/invoices', 'App\Controllers\InvoiceController@invoice'); // toutes les factures
$router->get('/invoices/:id', 'App\Controllers\InvoiceController@detailInvoice'); // détail d'une facture en particulier
$router->get('/newInvoice', 'App\Controllers\InvoiceController@newInvoice'); // nouvelle facture
$router->post('/newInvoice', 'App\Controllers\InvoiceController@newInvoicePost'); // facture à modifier
// Laura
$router->get('/annuaire', 'App\Controllers\SocietiesController@annuaire');
$router->get('/annuaire/:id', 'App\Controllers\SocietiesController@details');
$router->get('/newCompany', 'App\Controllers\SocietiesController@new_company');
$router->post('/newCompany', 'App\Controllers\SocietiesController@new_company_post');
$router->get('/deleteCompany/:id', 'App\Controllers\SocietiesController@delete_company');


//user
$router->get('/login', 'App\Controllers\UserController@login');

try {
    $router->run();
} catch (Exception $e) {
    echo $e->getMessage();
}
