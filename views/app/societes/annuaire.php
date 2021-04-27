<div class="table_content">
    <h1 class="table_title">COGIP : Annuaire des Sociétés</h1>

    <table class="styled-table">
    <h3>Clients</h3>
    <thead>
        <tr>
            <th>Nom</th>
            <th>TVA</th>
            <th>Pays</th>
            
        </tr>
    </thead>
    <tbody>
    <?php foreach ($params['clients'] as $clients) : ?>
    <tr>
        <td><a href="/annuaire/<?=$clients['company_id']?>"><?= $clients['company_name']?></a></td>
        <td><?= $clients['company_tva'] ?></td>
        <td><?= $clients['company_country'] ?></td>
    </tr>
<?php endforeach; ?>
    </tbody>
</table>

<table class="styled-table">
    <h3>Fournisseurs</h3>
    <thead>
        <tr>
            <th>Nom</th>
            <th>TVA</th>
            <th>Pays</th>
            
        </tr>
    </thead>
    <tbody>
    <?php foreach ($params['fournisseurs'] as $fournisseurs) : ?>
    <tr>
        <td><a href="/annuaire/<?=$fournisseurs['company_id']?>"><?= $fournisseurs['company_name']?></a></td>
        <td><?= $fournisseurs['company_tva'] ?></td>
        <td><?= $fournisseurs['company_country'] ?></td>
    </tr>
<?php endforeach; ?>
    </tbody>
</table>
</div>