<div class="card mdb-color darken-2">
    <div class="card-body">
        
        <form class="text-light p-5" method="post">
            <p class="h4 mb-4 text-center">Ajouter une guitare</p>

            <div class="md-form">
                <label for="fabricant" class="text-white">Titre *</label>
                <input type="text" name="fabricant" id="fabricant" class="form-control mb-4 text-white" required>
            </div>
            <div class="md-form">
                <label for="modele" class="text-white">Description *</label>
                <input type="text" name="modele" id="modele" class="form-control mb-4 text-white" required>
            </div>
            <div class="md-form">
                <label for="annee" class="text-white">Pegi *</label>
                <input type="number" name="annee" id="annee" min="1000" max="<?= date("Y", time()) ?>" value="<?= date("Y", time()) ?>" class="form-control mb-4 text-white" required>
            </div>
            <div class="md-form">
                <label for="prix" class="text-white">Lien *</label>
                <input type="number" name="prix" id="prix" value="0" step="any" class="form-control mb-4 text-white" required>
            </div>
            <div class="md-form">
                <select name="type" class="browser-default custom-select">
                    <?php
                        $request = $bdd->query('SELECT * FROM categorie ORDER BY id DESC');
                        
                        foreach ($request->fetchAll(PDO::FETCH_ASSOC) as $option) {
                    ?>
                        <option value="<?= $option['id'] ?>"><?= $option['type'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="md-form">
                <select name="type" class="browser-default custom-select">
                    <?php
                        $request = $bdd->query('SELECT * FROM editeur ORDER BY id DESC');
                        
                        foreach ($request->fetchAll(PDO::FETCH_ASSOC) as $option) {
                    ?>
                        <option value="<?= $option['id'] ?>"><?= $option['nom'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>

            <button class="btn mdb-color darken-2 btn-block my-4" name="submit" type="submit">Ajouter cette guitare</button>

        </form>
        <!-- Default form login -->

    </div>

</div>