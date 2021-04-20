<h1>COGIP : Listing des factures</h1>

<?php var_dump($params['peoples'][0]);
?>

<?php foreach ($params['peoples'] as $peoples) : ?>

    <p>
        <a href="/listInvoice/<?= $peoples['invoice_id']  ?>">
            <?= $peoples['invoice_number'] ?>
        </a>
    </p>
<?php endforeach; ?>