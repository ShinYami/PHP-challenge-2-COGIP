
<div class="table_content">
<h1 class="table_title">Listes des contacts</h1>

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
    <?php foreach ($params['peoples'] as $peoples) : ?>

<tr>
    <td><a href="./listeContact/<?= $peoples['people_id']  ?>">
        <?= $peoples['people_firstname'] ?> <?= $peoples['people_lastname'] ?>
    </a></td>
    <td><?=$peoples['people_phone']?></td>
    <td><?=$peoples['people_email']?></td>
    <td><?=$peoples['company_name']?></td>
</tr>
<?php endforeach; ?>
    </tbody>
</table>

</div>
