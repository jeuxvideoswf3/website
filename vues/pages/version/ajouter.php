<div class="card mdb-color darken-2">
    <div class="card-body">
        
        <form class="text-light p-5" method="post">
            <p class="h4 mb-4 text-center">Ajouter une version</p>

            <?php
            
                if (isset($_POST['submit'])) {
                    $version = new Version(array(
                        "JeuId" => $_POST['jeu'],
                        "SupportId" => $_POST['support'],
                        "ReleaseDate" => $_POST['releasedate']
                    ));
                    
                    $versionManager = new VersionManager($bdd);
                    if ($versionManager->add($version)) {
                        echo "La version a été ajoutée avec succès";
                    } else {
                        echo "Une erreur est survenue lors de l'ajout";
                    }
                }

            ?>

            <div class="md-form">
                <select name="jeu" class="browser-default custom-select">
                    <?php
                        $request = $bdd->query('SELECT * FROM jeu ORDER BY id DESC');
                        
                        foreach ($request->fetchAll(PDO::FETCH_ASSOC) as $option) {
                    ?>
                        <option value="<?= $option['id'] ?>"><?= $option['titre'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="md-form">
                <select name="support" class="browser-default custom-select">
                    <?php
                        $request = $bdd->query('SELECT * FROM support ORDER BY id DESC');
                        
                        foreach ($request->fetchAll(PDO::FETCH_ASSOC) as $option) {
                    ?>
                        <option value="<?= $option['id'] ?>"><?= $option['nom'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="md-form">
                <input type="date" name="releasedate" class="form-control mb-4 text-white" required>
            </div>

            <button class="btn mdb-color darken-2 btn-block my-4" name="submit" type="submit">Ajouter cette version</button>

        </form>

    </div>

</div>