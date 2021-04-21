<?php
//var_dump($params['last5People'][0])
?>

<main class="content">
    <div class="welcome">
        <h1>Bienvenu à la COGIP</h1>
        <h2>Bonjour</h2>
    </div>

    <div class="add-elem">
        <a class="add-btn" href="/newInvoice">Ajouter une facture</a>
        <a class="add-btn" href="/newContact">Ajouter un contact</a>
        <a class="add-btn" href="/newCompany">Ajouter une société</a>
    </div>

    <div class="table_content">
        <h2 class="table_title">Dernières Factures</h1>

            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Numéro facture</th>
                        <th>Dates</th>
                        <th>Société</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>

    </div>

    <div class="table_content">
        <h2 class="table_title">Derniers Contacts</h1>

            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Société</th>
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
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

    </div>

    <div class="table_content">
        <h2 class="table_title">Dernières Sociétés</h1>

            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>TVA</th>
                        <th>Pays</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>

    </div>