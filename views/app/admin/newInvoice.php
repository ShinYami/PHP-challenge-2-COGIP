<?php

$invoice_number = '';
$invoice_date = '';

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
        <select name="company" id="select_company">
            <?php foreach ($params['company'] as $company) : ?>
            <option value="<?= $company['company_id'] ?>" required> <?= $company['company_name'] ?></option>
            <?php endforeach ?>
        </select>
        <small class='error'><?php echo "Société requise"; ?></small>
    </div>
    <div class="select">
        <label for="people_firstlastname">Personne de contact pour la facture</label>
        <select name="people_firstlastname" id="select_contact">
            <?php foreach ($params['people'] as $people) : ?>
            <option value="<?= $people['people_id'] ?>" required> <?= $people['people_firstname']." " ?><?= $people['people_lastname'] ?></option>
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