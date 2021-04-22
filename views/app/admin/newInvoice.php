<?php

$invoice_number = '';
$invoice_date = '';

?>

<h1>Ajout nouvelle facture</h1>

<form method="POST" action="/newInvoice">
    <div>
        <label for="invoice_number">Numéro de facture</label>
        <input type="text" name="invoice_number" value="<?php echo $invoice_number; ?>" required>
        <small class='error'><?php echo "Numéro de facture requis"; ?></small>
    </div>
    <div>
        <label for="invoice_date">Date de facture</label>
        <input type="date" name="invoice_date" value="<?php echo $invoice_date; ?>" required>
        <small class='error'><?php echo "Date de facture requise"; ?></small>
    </div>
    <div class="select">
        <label for="company_name">Société</label>
        <select name="company_name" id="select_company">
            <?php foreach ($params['invoiceAllCompany'] as $company) : ?>
                <option value="<?= $company['company_id'] ?>"> <?= $company['company_name'] ?></option>
            <?php endforeach ?>
        </select>
        <small class='error'><?php echo "Société requise"; ?></small>
    </div>
    <div class="select">
        <label for="people_firstlastname">Personne de contact pour la facture</label>
        <select name="people_firstlastname" id="select_contact">
            <?php foreach ($params['invoicePeople'] as $people) : ?>
                <option value="<?= $people['people_id'] ?>"> <?= $people['people_firstname'] ?> <?= $people['people_lastname'] ?></option>
            <?php endforeach ?>
        </select>
        <small class='error'><?php echo "Contact requis"; ?></small>
    </div>
    <button type="submit" name="button">Envoyer</button>
</form>