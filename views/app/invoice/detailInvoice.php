<?//php var_dump($params['invoiceDetail']) ?>
<?//php var_dump($params['invoiceContact']) ?>
<?//php var_dump($params['invoiceCompany']) ?>

<div class="table_content">
<h1>Facture : <?= $params['invoiceDetail'][0]['invoice_number'] ?></h1>

<h2>Société liée à la facture</h2>
<p>Nom : <?= $params['invoiceCompany'][0]['company_name'] ?></p>
<p>TVA : <?= $params['invoiceCompany'][0]['company_tva'] ?></p>
<p>Type de société : <?= $params['invoiceCompany'][0]['type_name'] ?></p>

<h2>Personne de contact</h2>
<p>Nom : <?= $params['invoiceContact'][0]['people_firstname'] ?> <?= $params['invoiceContact'][0]['people_lastname'] ?></p>
<p>Email : <?= $params['invoiceContact'][0]['people_email'] ?></p>
<p>Phone : <?= $params['invoiceContact'][0]['people_phone'] ?></p>
</div>
