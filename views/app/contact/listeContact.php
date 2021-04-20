<h1>Listes des contacts</h1>

<?php var_dump($params['peoples'][0]);
?>

<?php foreach ($params['peoples'] as $peoples) : ?>

    <p>
        <a href="/listeContact/<?= $peoples['people_id']  ?>">
            <?= $peoples['people_firstname'] ?>
        </a>
    </p>
<?php endforeach; ?>