<?php

$invoice_number = '';
$invoice_date = '';

?>
<main class="content">
    <form method="POST" action="/newInvoice">
        <div class="group">

            <input type="text" name="invoice_number" value="<?php echo $invoice_number; ?>">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label for="invoice_number">Numéro de facture</label>

        </div>
        <div class="group">

            <span class="highlight"></span>
            <span class="bar"></span>
            <input type="date" name="invoice_date" value="<?php echo $invoice_date; ?>">
            <label for="invoice_date">Date de facture</label>

        </div>
        <div class="select">
            <select name="company_id" id="select_company">
                <?php foreach ($params['invoiceAllCompany'] as $company) : ?>
                    <option value="<?= $company['company_id'] ?>"> <?= $company['company_name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="select">
            <select name="people_id" id="select_contact">
                <?php foreach ($params['invoicePeople'] as $people) : ?>
                    <option value="<?= $people['people_id'] ?>"> <?= $people['people_firstname'] ?> <?= $people['people_lastname'] ?></option>
                <?php endforeach ?>
            </select>

        </div>
        <div class="group btn">
            <button type="submit">Soumettre</button>
        </div>

    </form>
</main>