<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company</title>
</head>
<body>
    <div>
        <?php $company = $params['companyInfos']; ?>
        <h1>Company : <?= $company['company_name'] ?></h1>
    </div>
    <!-- var_dump($params['companyInfos']);
var_dump($params['contactId']);
var_dump($params['invoiceId']); -->
</body>
</html>
