<?php 
//var_dump($params['compagny'][0]);
// juste ne pas changer les names et values du select
?>

    <main class="content">
        <section class="welcome">
            <h2>Ajouter un nouveau contact</h2>
        </section>

        <form action="/newContact" method="post">

            <div class="group">
                <input type="text" name="nom" value="">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label for="nom">Nom</label>
            </div>

            <div class="group">
                <input type="text" name="prenom" value="">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label for="prenom">Prénom</label>
            </div>

            <div class="group">
                <input type="text" name="phone" value="">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label for="phone">Phone</label>
            </div>

            <div class="group">
                <input type="text" name="email" value="">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label for="email">Email</label>
            </div>

            <div class="select">
                <select name="societe" id="slct">
                  <option selected disabled>Société</option>
                  <?php foreach ($params['compagny'] as $compagny) : ?>
            <option value="<?= $compagny['company_id'] ?>"> <?= $compagny['company_name'] ?></option>
        <?php endforeach ?>
                </select>
              </div>

            <div class="group btn">
                <button type="submit">SUBMIT</button>
            </div>


        </form>
    </main>
</form>