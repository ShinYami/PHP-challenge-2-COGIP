<h1>COGIP : Listing des factures</h1>

<?php
var_dump($params['invoices'][0]);
?>

<?php foreach ($params['invoices'] as $invoices) : ?>

    <p>
        <a href="/listInvoice/<?= $invoices['invoice_id']  ?>">
            <?= $invoices['invoice_number'] ?>
        </a>
    </p>
<?php endforeach; ?>