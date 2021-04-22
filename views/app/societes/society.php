
<div>
    <?php $company = $params['companyInfos']; ?>
    <h1>Company : <?= $company['company_name'] ?></h1>
    <ul>
        <li><?= $company['company_tva']?></li>
        <li><?= $company['type_name']?></li>
    </ul>
    <h2>Contact persons</h2>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($params['contactId'] as $contact) : ?>
                <tr>
                    <td><?= $contact['people_firstname'] . " " . $contact['people_lastname']?></td>
                    <td><?= $contact['people_phone'] ?></td>
                    <td><?= $contact['people_email'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- var_dump($params['companyInfos']);
var_dump($params['contactId']);
var_dump($params['invoiceId']); -->
