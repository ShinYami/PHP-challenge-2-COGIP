<?php

use Router\Router;

require '../vendor/autoload.php';



define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

$router = new Router($_GET['url']);

$router->get('/', 'App\Controllers\UserController@home');
$router->get('/toto', 'App\Controllers\UserController@contact');


// Romain
$router->get('/listeContact', 'App\Controllers\ContactController@listeContact');
$router->get('/listeContact/:id', 'App\Controllers\ContactController@detailContact');
$router->get('/newContact', 'App\Controllers\ContactController@newContact');
$router->post('/newContact', 'App\Controllers\ContactController@newContactPost');
/* Fred : concerne les factures (invoice) */
$router->get('/invoices', 'App\Controllers\InvoiceController@invoice'); // toutes les factures
$router->get('/invoices/:id', 'App\Controllers\InvoiceController@invoicePost'); // détail d'une facture en particulier
$router->get('/newInvoice', 'App\Controllers\InvoiceController@newInvoice'); // nouvelle facture
$router->post('/updateInvoice', 'App\Controllers\InvoiceController@updateInvoicePost'); // facture à modifier

try {
    $router->run();
} catch (Exception $e) {
    echo $e->getMessage();
}
