<?php
//var_dump($params['last5People'][0])
//var_dump($params['lastFiveInvoices'][0])
?>

<main class="content">
    <div class="welcome">
        <h1>Bienvenue à la COGIP</h1>
        <h2>Bonjour</h2>
    </div>

    <div class="add-elem">
        <a class="add-btn" href="/newInvoice">Ajouter une facture</a>
        <a class="add-btn" href="/newContact">Ajouter un contact</a>
        <a class="add-btn" href="/newCompany">Ajouter une société</a>
    </div>

    <div class="table_content">
        <h2 class="table_title">Dernières Factures</h2>

        <table class="styled-table">
            <thead>
                <tr>
                    <th>Numéro facture</th>
                    <th>Dates</th>
                    <th>Société</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($params['lastFiveInvoices'] as $lastFiveInvoices) : ?>
                    <tr>
                        <td><?= $lastFiveInvoices['invoice_number'] ?></td>
                        <td><?= $lastFiveInvoices['invoice_date'] ?></td>
                        <td><?= $lastFiveInvoices['company_name'] ?></td>
                        <td><a class="delete_btn" href="/deleteInvoice/<?= $lastFiveInvoices['invoice_id'] ?>">Supprimer</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <div class="table_content">
        <h2 class="table_title">Derniers Contacts</h2>

        <table class="styled-table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Société</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($params['last5People'] as $last5people) : ?>
                    <tr>
                        <td>
                            <?= $last5people['people_firstname'] ?> <?= $last5people['people_lastname'] ?>
                        </td>
                        <td><?= $last5people['people_phone'] ?></td>
                        <td><?= $last5people['people_email'] ?></td>
                        <td><?= $last5people['company_name'] ?></td>
                        <td><a class="delete_btn" href="/deleteContact/<?= $last5people['people_id'] ?>">Supprimer</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <div class="table_content">
        <h2 class="table_title">Dernières Sociétés</h2>

        <table class="styled-table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>TVA</th>
                    <th>Pays</th>
                    <th>Type</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($params['lastCompanies'] as $lastCompanies) : ?>
                    <tr>
                        <td><?= $lastCompanies['company_name'] ?></td>
                        <td><?= $lastCompanies['company_tva'] ?></td>
                        <td><?= $lastCompanies['company_country'] ?></td>
                        <td><?= $lastCompanies['type_name'] ?></td>
                        <td><a class="delete_btn" href="">Supprimer</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>