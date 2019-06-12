<div class="card mdb-color darken-2">
    <div class="card-body">
        
        <form class="text-light p-5" method="post">
            <p class="h4 mb-4 text-center">Ajouter une catégorie</p>

            <?php
            
                if (isset($_POST['submit'])) {
                    $categorie = new Categorie(array(
                        "type" => $_POST['type'],
                    ));
                    
                    $categorieManager = new CategorieManager($bdd);
                    if ($categorieManager->add($categorie)) {
                        echo "La catégorie a été ajoutée avec succès";
                    } else {
                        echo "Une erreur est survenue lors de l'ajout";
                    }
                }

            ?>

            <div class="md-form">
                <label for="type" class="text-white">Type *</label>
                <input type="text" name="type" id="type" class="form-control mb-4 text-white" required>
            </div>

            <button class="btn mdb-color darken-2 btn-block my-4" name="submit" type="submit">Ajouter cette catégorie</button>

        </form>

    </div>

</div>