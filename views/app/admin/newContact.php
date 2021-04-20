<?php
var_dump($params['compagny'][0]);
// juste ne pas changer les names et values du select
?>

<h1>Ajouter un nouveau contact</h1>

<form action="/newContact" method="post">

    <label for="nom">nom</label>
    <input type="text" name="nom" value="">

    <label for="prenom">prenom</label>
    <input type="text" name="prenom" value="">

    <label for="phone">phone</label>
    <input type="text" name="phone" value="">

    <label for="email">email</label>
    <input type="text" name="email" value="">

    <label for="societe">societe</label>
    <select name="societe">
        <?php foreach ($params['compagny'] as $compagny) : ?>
            <option value="<?= $compagny['company_id'] ?>"> <?= $compagny['company_name'] ?></option>
        <?php endforeach ?>
    </select>

    <button type="submit" name="button">Envoyer</button>
</form>