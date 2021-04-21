<?php var_dump($params['invoiceContact'] ?>
<?php var_dump($params['invoiceCompany'] ?>


<h1>Facture : <?= $params['invoices']['invoice_number'] ?></h1>

<p>Société liée à la facture</p>
<p>Nom : <?= $params['invoices']['company_name'] ?></p>
<p>TVA : <?= $params['invoices']['company_tva'] ?></p>
<p>Type de société : <?= $params['invoices']['type_name'] ?></p>

<p>Personne de contact</p>
<p>Nom : <?= $params['invoices']['people_firstname'] ?> <?= $params['invoices']['people_lastname'] ?></p>
<p>Email : <?= $params['invoices']['people_email'] ?></p>
<p>Phone : <?= $params['invoices']['people_phone'] ?></p>