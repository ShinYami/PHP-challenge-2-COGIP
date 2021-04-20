<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wep App</title>
    <link rel="stylesheet" href="<?= SCRIPTS . 'style' . DIRECTORY_SEPARATOR . 'header.css' ?>">
    <link rel="stylesheet" href="<?= SCRIPTS . 'style' . DIRECTORY_SEPARATOR . 'login.css' ?>">
    <link rel="stylesheet" href="<?= SCRIPTS . 'style' . DIRECTORY_SEPARATOR . 'table.css' ?>">

</head>

<body>
<header class="head">
        <nav class="navigation">
            <a href="/">Home</a>
            <a href="">Invoices</a>
            <a href="">Companies</a>
            <a href="/listeContact">Contacts</a>
            <a href="/login">Connexion</a>
        </nav>
    </header>
    <?= $content ?>

</body>

</html>