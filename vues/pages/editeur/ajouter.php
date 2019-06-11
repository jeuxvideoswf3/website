<div class="card mdb-color darken-2">
    <div class="card-body">
        
        <form class="text-light p-5" method="post">
            <p class="h4 mb-4 text-center">Ajouter un éditeur</p>

            <?php
            
                if (isset($_POST['submit'])) {
                    $editeur = new Editeur(array(
                        "nom" => $_POST['nom'],
                        "lien" => $_POST['lien']
                    ));
                    
                    $editeurManager = new EditeurManager($bdd);
                    if ($editeurManager->add($editeur)) {
                        echo "L'éditeur a été ajouté avec succès";
                    } else {
                        echo "Une erreur est survenue lors de l'ajout";
                    }
                }

            ?>

            <div class="md-form">
                <label for="nom" class="text-white">Nom *</label>
                <input type="text" name="nom" id="nom" class="form-control mb-4 text-white" required>
            </div>
            <div class="md-form">
                <label for="lien" class="text-white">Lien *</label>
                <input type="text" name="lien" id="lien" class="form-control mb-4 text-white" required>
            </div>

            <button class="btn mdb-color darken-2 btn-block my-4" name="submit" type="submit">Ajouter cet éditeur</button>

        </form>

    </div>

</div>