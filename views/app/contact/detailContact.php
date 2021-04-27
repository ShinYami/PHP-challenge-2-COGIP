<div class="table_content">
<h1>Contact <?= $params['people']['people_firstname'] ?> <?= $params['people']['people_lastname'] ?></h1>


<?php //var_dump($params['people']);
//var_dump($params['invoices']);
?>

<p>Contact : <?= $params['people']['people_firstname'] ?> <?= $params['people']['people_lastname'] ?></p>
<p>Société : <?= $params['people']['company_name'] ?></p>
<p>Email : <?= $params['people']['people_email'] ?></p>
<p>Phone : <?= $params['people']['people_phone'] ?></p>


    <h2>Contact pour les factures</h2>

    <table class="styled-table">
    <thead>
        <tr>
            <th>N° facture</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($params['invoices'] as $peoples) : ?>

<tr>
    <td><?=$peoples['invoice_number']?></td>
    <td><?=$peoples['invoice_date']?></td>
</tr>
<?php endforeach; ?>
    </tbody>
</table>
</div>