<?php

    $categorieManager = new CategorieManager($bdd);

    $data = $categorieManager->read($_GET['id']);

?>
<div class="card mdb-color darken-2">
    <div class="card-body">
        
        <form class="text-light p-5" method="post">
            <p class="h4 mb-4 text-center">Éditer une catégorie</p>

            <?php
            
                if (isset($_POST['submit'])) {
                    $categorie = new Categorie(array(
                        "id" => $data['id'],
                        "type" => $_POST['type'],
                    ));
                    
                    if ($categorieManager->update($categorie)) {
                        echo "La catégorie a été modifiée avec succès";
                    } else {
                        echo "Une erreur est survenue lors de la modification";
                    }
                }

            ?>

            <div class="md-form">
                <label for="type" class="text-white">Type *</label>
                <input type="text" name="type" id="type" value="<?= $data['type'] ?>" class="form-control mb-4 text-white" required>
            </div>

            <button class="btn mdb-color darken-2 btn-block my-4" name="submit" type="submit">Éditer cette catégorie</button>

        </form>

    </div>

</div>