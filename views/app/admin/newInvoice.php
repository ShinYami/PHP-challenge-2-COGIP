<?php

$msg = ['', '', '', ''];
$invoice_number = '';
$invoice_date = '';
$company_name = '';
$people_firstlastname = '';

function selectCompany()
{
}

function selectPeople()
{
}


?>
<h1>Nouvelles Factures</h1>

<form method="POST" action="/newInvoice">
    <div>
        <label for="invoice_number">Numéro de facture</label>
        <input type="text" name="invoice_number" value="<?php echo $invoice_number; ?>" required>
        <div class='error'><?php echo $msg[0]; ?></div>
    </div>
    <div>
        <label for="invoice_date">Date de facture</label>
        <input type="date" name="invoice_date" value="<?php echo $invoice_date; ?>" required>
        <div class='error'><?php echo $msg[1]; ?></div>
    </div>
    <div>
        <label for="company_name">Société</label>
        <input type="text" name="company_name" value="<?php echo $company_name; ?>" required>
        <div class='error'><?php echo $msg[2]; ?></div>
    </div>
    <div>
        <label for="people_firstlastname">Personne de contact pour la facture</label>
        <input type="text" name="people_firstlastname" value="<?php echo $people_firstlastname; ?>" required>
        <div class='error'><?php echo $msg[3]; ?></div>
    </div>
    <button type="submit" name="button">Envoyer</button>
</form>