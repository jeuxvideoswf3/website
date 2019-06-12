<?php

    $supportManager = new SupportManager($bdd);

    $data = $supportManager->read($_GET['id']);

?>
<div class="card mdb-color darken-2">
    <div class="card-body">
        
        <form class="text-light p-5" method="post">
            <p class="h4 mb-4 text-center">Éditer un support</p>

            <?php
            
                if (isset($_POST['submit'])) {
                    $support = new Support(array(
                        "id" => $data['id'],
                        "nom" => $_POST['nom'],
                    ));
                    
                    if ($supportManager->update($support)) {
                        echo "Le support a été modifié avec succès";
                    } else {
                        echo "Une erreur est survenue lors de la modification";
                    }
                }

            ?>

            <div class="md-form">
                <label for="nom" class="text-white">Nom *</label>
                <input type="text" name="nom" id="nom" value="<?= $data['nom'] ?>" class="form-control mb-4 text-white" required>
            </div>

            <button class="btn mdb-color darken-2 btn-block my-4" name="submit" type="submit">Éditer ce support</button>

        </form>

    </div>

</div>