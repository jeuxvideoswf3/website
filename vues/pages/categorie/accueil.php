<section class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Type</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $categorieManager = new CategorieManager($bdd);
                foreach($categorieManager->read() as $categorie):
            ?>
            <tr>
                <th scope="row"><?= $categorie['id'] ?></th>
                <td><?= $categorie['type'] ?></td>
                <td>
                    <a href="index.php?p=categorie.editer&id=<?= $categorie['id'] ?>" class="btn btn-light">Modifier</a>
                    <a href="index.php?p=categorie.supprimer&id=<?= $categorie['id'] ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>