<main class="content">
    <section class="welcome">
        <h2>Ajouter un nouveau contact</h2>
    </section>

    <form action="/newCompany" method="post">

        <div class="group">
            <input type="text" name="name" value="">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label for="name">Company name</label>
        </div>

        <div class="group">
            <input type="text" name="tva" value="">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label for="tva">TVA number</label>
        </div>

        <div class="group">
            <input type="text" name="phone" value="">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label for="phone">Phone</label>
        </div>

        <div class="select">
            <select name="typeid" id="slct">
                <option selected disabled>Company type</option>
                <?php foreach ($params['companyInfos'] as $company) : ?>
                    <option value="<?= $company['company_id'] ?>"> <?= $company['type_name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="group btn">
            <button type="submit">SUBMIT</button>
        </div>


    </form>
</main>