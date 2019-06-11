<section class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Lien</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $editeurManager = new EditeurManager($bdd);
                foreach($editeurManager->read() as $editeur):
            ?>
            <tr>
                <th scope="row"><?= $editeur['id'] ?></th>
                <td><?= $editeur['nom'] ?></td>
                <td><?= $editeur['lien'] ?></td>
                <td>
                    <a href="index.php?p=editeur.voir&id=<?= $editeur['id'] ?>" class="btn">Voir</a>
                    <a href="index.php?p=editeur.editer&id=<?= $editeur['id'] ?>" class="btn btn-light">Modifier</a>
                    <a href="index.php?p=editeur.supprimer&id=<?= $editeur['id'] ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>