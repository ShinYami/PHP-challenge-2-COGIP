<main class="content">
    <section class="welcome">
        <h2>Ajouter un nouveau contact</h2>
    </section>

    <form action="/newCompany" method="post">

        <div class="group">
            <input type="text" name="nom" value="">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label for="nom">Nom de la companie</label>
        </div>

        <div class="group">
            <input type="text" name="tva" value="">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label for="tva">Numéro de TVA</label>
        </div>

        <div class="group">
            <input type="text" name="pays" value="">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label for="pays">Pays</label>
        </div>

        <div class="select">
            <select name="typeid" id="slct">
                <option selected disabled>Type de companie</option>
                <?php foreach ($params['newCompany'] as $company) : ?>
                    <option value="<?= $company['type_id'] ?>"> <?= $company['type_name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="group btn">
            <button type="submit">Soumettre</button>
        </div>


    </form>
</main>