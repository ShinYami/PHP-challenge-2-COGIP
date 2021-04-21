<?php
//var_dump($params['invoices'][0]);
?>

<div class="table_content">
<h1 class="table_title">Listes des Factures</h1>

<table class="styled-table">
    <thead>
        <tr>
            <th>Numéro facture</th>
            <th>Dates</th>
            <th>Société</th>
            <th>Type</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($params['invoices'] as $invoices) : ?>
        <tr>
    <td><a href="/invoices/1">
        <?= $invoices['invoice_number'] ?>
    </a></td>
    <td><?=$invoices['invoice_date']?></td>
    <td><?=$invoices['company_name']?></td>
    <td><?=$invoices['type_name']?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</div>