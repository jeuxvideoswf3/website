<?php

    $editeurManager = new EditeurManager($bdd);

    $data = $editeurManager->read($_GET['id']);

?>
<div class="card mdb-color darken-2">
    <div class="card-body">
        
        <form class="text-light p-5" method="post">
            <p class="h4 mb-4 text-center">Éditer un éditeur</p>

            <?php
            
                if (isset($_POST['submit'])) {
                    $editeur = new Editeur(array(
                        "id" => $data['id'],
                        "nom" => $_POST['nom'],
                        "lien" => $_POST['lien']
                    ));
                    
                    if ($editeurManager->update($editeur)) {
                        echo "L'éditeur a été modifié avec succès";
                    } else {
                        echo "Une erreur est survenue lors de la modification";
                    }
                }

            ?>

            <div class="md-form">
                <label for="nom" class="text-white">Nom *</label>
                <input type="text" name="nom" id="nom" value="<?= $data['nom'] ?>" class="form-control mb-4 text-white" required>
            </div>
            <div class="md-form">
                <label for="lien" class="text-white">Lien *</label>
                <input type="text" name="lien" id="lien" value="<?= $data['lien'] ?>" class="form-control mb-4 text-white" required>
            </div>

            <button class="btn mdb-color darken-2 btn-block my-4" name="submit" type="submit">Éditer cet éditeur</button>

        </form>

    </div>

</div>