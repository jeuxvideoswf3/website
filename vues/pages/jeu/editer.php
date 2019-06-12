<?php

    $jeuManager = new JeuManager($bdd);

    $data = $jeuManager->read($_GET['id']);

?>
<div class="card mdb-color darken-2">
    <div class="card-body">
        
        <form class="text-light p-5" method="post">
            <p class="h4 mb-4 text-center">Éditer un jeu</p>

            <?php
            
                if (isset($_POST['submit'])) {
                    $jeu = new Jeu(array(
                        "id" => $data['id'],
                        "titre" => $_POST['titre'],
                        "description" => $_POST['description'],
                        "pegi" => $_POST['pegi'],
                        "lien" => $_POST['lien'],
                        "categorieId" => $_POST['categorie'],
                        "editeurId" => $_POST['editeur']
                    ));
                    
                    $jeuManager = new JeuManager($bdd);
                    if ($jeuManager->update($jeu)) {
                        echo "Le jeu a été éditer avec succès";
                    } else {
                        echo "Une erreur est survenue lors de la modification";
                    }
                }

            ?>

            <div class="md-form">
                <label for="titre" class="text-white">Titre *</label>
                <input type="text" name="titre" id="titre" value="<?= $data['titre'] ?>" class="form-control mb-4 text-white" required>
            </div>
            <div class="md-form">
                <label for="description" class="text-white">Description *</label>
                <textarea name="description" id="description" class="md-textarea form-control text-white" rows="3"><?= $data['description'] ?></textarea>
            </div>
            <div class="md-form">
                <select name="pegi" class="browser-default custom-select">
                    <?php
                        $pegis = [3, 7, 12, 16, 18];
                        foreach ($pegis as $pegi) {
                            if (intval($data['pegi']) === $pegi) {
                        ?>
                            <option value="<?= $pegi ?>" selected>Pegi <?= $pegi ?></option>
                        <?php
                            } else {
                        ?>
                            <option value="<?= $pegi ?>">Pegi <?= $pegi ?></option>
                        <?php
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="md-form">
                <label for="lien" class="text-white">Lien *</label>
                <input type="text" name="lien" id="lien" value="<?= $data['lien'] ?>" class="form-control mb-4 text-white" required>
            </div>
            <div class="md-form">
                <select name="categorie" class="browser-default custom-select">
                    <?php
                        $request = $bdd->query('SELECT * FROM categorie ORDER BY id DESC');
                        
                        foreach ($request->fetchAll(PDO::FETCH_ASSOC) as $option) {
                            if ($data['categorie_id'] === $option['id']) {
                        ?>
                            <option value="<?= $option['id'] ?>" selected><?= $option['type'] ?></option>
                        <?php
                            } else {
                        ?>
                            <option value="<?= $option['id'] ?>"><?= $option['type'] ?></option>
                        <?php
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="md-form">
                <select name="editeur" class="browser-default custom-select">
                    <?php
                        $request = $bdd->query('SELECT * FROM editeur ORDER BY id DESC');
                        
                        foreach ($request->fetchAll(PDO::FETCH_ASSOC) as $option) {
                            if ($data['editeur_id'] === $option['id']) {
                        ?>
                            <option value="<?= $option['id'] ?>" selected><?= $option['nom'] ?></option>
                        <?php
                            } else {
                        ?>
                            <option value="<?= $option['id'] ?>"><?= $option['nom'] ?></option>
                        <?php
                            }
                        }
                    ?>
                </select>
            </div>

            <button class="btn mdb-color darken-2 btn-block my-4" name="submit" type="submit">Éditer ce jeu</button>

        </form>
        <!-- Default form login -->

    </div>

</div>