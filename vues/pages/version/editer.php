<?php

    $versionManager = new VersionManager($bdd);

    $data = $versionManager->read($_GET['id']);

?>
<div class="card mdb-color darken-2">
    <div class="card-body">
        
        <form class="text-light p-5" method="post">
            <p class="h4 mb-4 text-center">Éditer une version</p>

            <?php
            
                if (isset($_POST['submit'])) {
                    $version = new Version(array(
                        "id" => $data['id'],
                        "JeuId" => $_POST['jeu'],
                        "SupportId" => $_POST['support'],
                        "ReleaseDate" => $_POST['releasedate']
                    ));
                    
                    if ($versionManager->update($version)) {
                        echo "La version a été modifiée avec succès";
                    } else {
                        echo "Une erreur est survenue lors de la modification";
                    }

                }

            ?>

            <div class="md-form">
                <select name="jeu" class="browser-default custom-select">
                    <?php
                        $request = $bdd->query('SELECT * FROM jeu ORDER BY id DESC');
                        
                        foreach ($request->fetchAll(PDO::FETCH_ASSOC) as $option) {
                            if ($data['jeu_id'] === $option['id']) {
                        ?>
                            <option value="<?= $option['id'] ?>" selected><?= $option['titre'] ?></option>
                        <?php
                            } else {
                        ?>
                            <option value="<?= $option['id'] ?>"><?= $option['titre'] ?></option>
                        <?php
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="md-form">
                <select name="support" class="browser-default custom-select">
                    <?php
                        $request = $bdd->query('SELECT * FROM support ORDER BY id DESC');
                        
                        foreach ($request->fetchAll(PDO::FETCH_ASSOC) as $option) {
                            if ($data['support_id'] === $option['id']) {
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
            <div class="md-form">
                <input type="date" name="releasedate" value="<?= $data['releasedate'] ?>" class="form-control mb-4 text-white" required>
            </div>

            <button class="btn mdb-color darken-2 btn-block my-4" name="submit" type="submit">Éditer cette version</button>

        </form>

    </div>

</div>