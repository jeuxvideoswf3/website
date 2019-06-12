<div class="card mdb-color darken-2">
    <div class="card-body">
        
        <form class="text-light p-5" method="post">
            <p class="h4 mb-4 text-center">Ajouter un jeu</p>

            <?php
            
                if (isset($_POST['submit'])) {
                    $jeu = new Jeu(array(
                        "titre" => $_POST['titre'],
                        "description" => $_POST['description'],
                        "pegi" => $_POST['pegi'],
                        "lien" => $_POST['lien'],
                        "categorieId" => $_POST['categorie'],
                        "editeurId" => $_POST['editeur']
                    ));
                    
                    $jeuManager = new JeuManager($bdd);
                    if ($jeuManager->add($jeu)) {
                        echo "Le jeu a été ajouté avec succès";
                    } else {
                        echo "Une erreur est survenue lors de l'ajout";
                    }
                }

            ?>

            <div class="md-form">
                <label for="titre" class="text-white">Titre *</label>
                <input type="text" name="titre" id="titre" class="form-control mb-4 text-white" required>
            </div>
            <div class="md-form">
                <label for="description" class="text-white">Description *</label>
                <textarea name="description" id="description" class="md-textarea form-control text-white" rows="3"></textarea>
            </div>
            <div class="md-form">
                <select name="pegi" class="browser-default custom-select">
                    <?php
                        $pegis = [3, 7, 12, 16, 18];
                        foreach ($pegis as $pegi) {
                    ?>
                        <option value="<?= $pegi ?>">Pegi <?= $pegi ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="md-form">
                <label for="lien" class="text-white">Lien *</label>
                <input type="text" name="lien" id="lien" class="form-control mb-4 text-white" required>
            </div>
            <div class="md-form">
                <select name="categorie" class="browser-default custom-select">
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
                <select name="editeur" class="browser-default custom-select">
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

            <button class="btn mdb-color darken-2 btn-block my-4" name="submit" type="submit">Ajouter ce jeu</button>

        </form>
        <!-- Default form login -->

    </div>

</div>