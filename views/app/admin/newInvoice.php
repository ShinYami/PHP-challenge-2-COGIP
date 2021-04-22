<?php

$invoice_number = '';
$invoice_date = '';

if (isset($_POST['button'])) {

    // vérification (sanitize et validate) des entrées invoice_number
    if (isset($_POST['invoice_number'])) {
        $invoice_number = filter_var($_POST['invoice_number'], FILTER_SANITIZE_STRING);
        //garde uniquement les lettres
        $patterninvoice_number = "/^[A-Z-0-9]*$/";
        preg_match($patterninvoice_number, $invoice_number);
        //fin de regex
        if (!preg_match($patterninvoice_number, $invoice_number)) {
            $msg = "Mauvaise entrée dans le numéro de facture";
            $valid = false;
        }
    }

    // vérification (sanitize et validate) des entrées invoice_date
    if (isset($_POST['invoice_date'])) {
        $invoice_date = filter_var($_POST['invoice_date'], FILTER_SANITIZE_DATE);
        // regex date
        $patterninvoice_date = "/^[0-9\/]*$/";
        preg_match($patterninvoice_date, $invoice_date);
        // fin regex
        if (!preg_match($patterninvoice_date, $invoice_date)) {
            $msg = "Mauvaise entrée dans la date";
            $valid = false;
        }
    }

    // vérification qu'il y a bien une entrée dans la company_name
    if (isset($_POST['company_name'])) {
        $valid = true;
    } else {
        $valid = false;
    }

    // vérification qu'il y a bien une entrée dans le people_firstlastname
    if (isset($_POST['people_firstlastname'])) {
        $valid = true;
    } else {
        $valid = false;
    }

    // si les données ont bien été validées et sont correctes
    if ($valid == true) {
        // lancer la function newInvoicePost() contenue dans invoiceController.php
        $createInvoice = (new Invoice())->newInvoicePost();
    } else { // si $valid == false
        // rechargement de la page
        return header('Location: /newInvoice');
    }
}

?>

<style>
    .error {
        color: red;
    }
</style>

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
            <?php foreach ($params['people'] as $people) : ?>
                <option value="<?= $people['people_id'] ?>"> <?= $people['people_firstname'] ?> <?= $people['people_lastname'] ?></option>
            <?php endforeach ?>
        </select>
        <small class='error'><?php echo "Contact requis"; ?></small>
    </div>
    <button type="submit" name="button">Envoyer</button>
</form>

    <main class="content">
        <section class="welcome">
            <h2>Ajouter un nouveau contact</h2>
        </section>

        <form method="POST" action="/newInvoice">

            <div class="group">
                <input type="text" name="invoice_number" value="<?php echo $invoice_number; ?>" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label for="nom">Numéro de facture</label>
                <small class='error'><?php echo "Numéro de facture requis"; ?></small>
            </div>

            <div class="group">
                <input type="date" name="invoice_date" value="<?php echo $invoice_date; ?>" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label for="prenom">Date de facture</label>
                <small class='error'><?php echo "Date de facture requise"; ?></small>
            </div>

            <div class="select">
                <select name="company" id="slct">
                  <option selected disabled>Société</option>
                  <?php foreach ($params['company'] as $company) : ?>
            <option value="<?= $company['company_id'] ?>" required> <?= $company['company_name'] ?></option>
            <?php endforeach ?>
                </select>
                <small class='error'><?php echo "Société requise"; ?></small>
              </div>

              <div class="select">
                <select name="people_firstlastname" id="slct">
                  <option selected disabled>Personne de contact pour la facture</option>
                  <?php foreach ($params['people'] as $people) : ?>
            <option value="<?= $people['people_id'] ?>" required> <?= $people['people_firstname']." " ?><?= $people['people_lastname'] ?></option>
            <?php endforeach ?>
                </select>
                <small class='error'><?php echo "Contact requis"; ?></small>
              </div>


            <div class="group btn">
                <button type="submit" name="button">SUBMIT</button>
            </div>


        </form>
    </main>
</form>