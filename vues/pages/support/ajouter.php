<div class="card mdb-color darken-2">
    <div class="card-body">
        
        <form class="text-light p-5" method="post">
            <p class="h4 mb-4 text-center">Ajouter un support</p>

            <?php
            
                if (isset($_POST['submit'])) {
                    $support = new Support(array(
                        "nom" => $_POST['nom'],
                    ));
                    
                    $supportManager = new SupportManager($bdd);
                    if ($supportManager->add($support)) {
                        echo "Le support a été ajouté avec succès";
                    } else {
                        echo "Une erreur est survenue lors de l'ajout";
                    }
                }

            ?>

            <div class="md-form">
                <label for="nom" class="text-white">Nom *</label>
                <input type="text" name="nom" id="nom" class="form-control mb-4 text-white" required>
            </div>

            <button class="btn mdb-color darken-2 btn-block my-4" name="submit" type="submit">Ajouter ce support</button>

        </form>

    </div>

</div>