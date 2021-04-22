<?php var_dump($params['invoiceDetail']) ?>
<?php var_dump($params['invoiceContact']) ?>
<?php var_dump($params['invoiceCompany']) ?>


<h1>Facture : <?= $params['invoiceDetail']['invoice_number'] ?></h1>

<p>Société liée à la facture</p>
<p>Nom : <?= $params['invoiceCompany']['company_name'] ?></p>
<p>TVA : <?= $params['invoiceCompany']['company_tva'] ?></p>
<p>Type de société : <?= $params['invoiceCompany']['type_name'] ?></p>

<p>Personne de contact</p>
<p>Nom : <?= $params['invoiceContact']['people_firstname'] ?> <?= $params['invoiceContact']['people_lastname'] ?></p>
<p>Email : <?= $params['invoiceContact']['people_email'] ?></p>
<p>Phone : <?= $params['invoiceContact']['people_phone'] ?></p>