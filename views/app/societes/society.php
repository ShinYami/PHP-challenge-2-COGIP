<?php
//var_dump($params['companyInfos']);
//var_dump($params['contactId']);
//var_dump($params['invoiceId']); ?>

<div class="table_content">
    <?php $company = $params['companyInfos']; ?>
    <h1>Company : <?= $company['company_name'] ?></h1>
    
        <p>TVA : <?= $company['company_tva']?></p>
        <p>Type : <?= $company['type_name']?></p>
    

    <h2>Personne de Contact</h2>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($params['contactId'] as $contact) : ?>
                <tr>
                    <td><?= $contact['people_firstname'] . " " . $contact['people_lastname']?></td>
                    <td><?= $contact['people_phone'] ?></td>
                    <td><?= $contact['people_email'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Factures</h2>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Numéro Facture</th>
                <th>Date</th>
                <th>Personne de Contact</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($params['invoiceId'] as $invoice) : ?>
                <tr>
                    <td><?= $invoice['invoice_number'] ?></td>
                    <td><?= $invoice['invoice_date'] ?></td>
                    <td><?= $invoice['people_email'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
