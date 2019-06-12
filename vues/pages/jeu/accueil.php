<section class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Pegi</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Éditeur</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $jeuManager = new JeuManager($bdd);
                foreach($jeuManager->read() as $jeu):
                    if (strlen($jeu['description']) >= 100) {
                        $description = substr($jeu['description'], 0, 100) . '...';
                    } else {
                        $description = $jeu['description'];
                    }
            ?>
            <tr>
                <th scope="row"><?= $jeu['id'] ?></th>
                <td><a href="<?= $jeu['lien'] ?>" target="_blank"><?= $jeu['titre'] ?></a></td>
                <td><?= $description ?></td>
                <td><?= $jeu['pegi'] ?></td>
                <td><?= $jeu['type'] ?></td>
                <td><a href="<?= $jeu['editeurlink'] ?>" target="_blank"><?= $jeu['nom'] ?></a></td>
                <td>
                    <a href="index.php?p=jeu.editer&id=<?= $jeu['id'] ?>" class="btn btn-light">Modifier</a>
                    <a href="index.php?p=jeu.supprimer&id=<?= $jeu['id'] ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>