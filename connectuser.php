<?php 
$error=null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Système de gestion des bases de données pour la COGIP" />
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body> 
    <div class="container my-5">
        <?php if($error): ?>
            <div class="alert alert-success"><?= $error ?></div>
        <?php endif ?>
        <form action="login.php" method="post">
            <div>
                <label class="form-label" for="login">Login :</label>
                <input type="text" name="login" value="" required> <!-- Pas de récupération des informations -->
            </div>
            <div>
                <label class="form-label" for="password">Mot de passe : </label>
                <input type="password" name="password" value="" required> <!-- Pas de récupération des informations -->
            </div>
        
            <button class="btn btn-primary" type="submit" value="register "name="button">Se connecter</button>
        </form>
    </div>
</body>
</html>