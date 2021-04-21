<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COGIP : Companies Directory</title>
</head>
<body>
    <div>
        <h1>COGIP : Companies Directory</h1>
    </div>

    <div>
        <h2>Clients</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>TVA</th>
                        <th>Country</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($params['clients'] as $clients) : ?>
                        <tr>
                            <td><a href="./annuaire/<?=$clients['company_id']?>"><?= $clients['company_name']?></a></td>
                            <td><?= $clients['company_tva'] ?></td>
                            <td><?= $clients['company_country'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>

    <div>
        <h2>Suppliers</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>TVA</th>
                        <th>Country</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($params['fournisseurs'] as $fournisseurs) : ?>
                        <tr>
                            <td><a href="./annuaire/<?=$fournisseurs['company_id']?>"><?= $fournisseurs['company_name']?></a></td>
                            <td><?= $fournisseurs['company_tva'] ?></td>
                            <td><?= $fournisseurs['company_country'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>
</body>
</html>
