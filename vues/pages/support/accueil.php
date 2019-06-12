<section class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $supportManager = new SupportManager($bdd);
                foreach($supportManager->read() as $support):
            ?>
            <tr>
                <th scope="row"><?= $support['id'] ?></th>
                <td><?= $support['nom'] ?></td>
                <td>
                    <a href="index.php?p=support.editer&id=<?= $support['id'] ?>" class="btn btn-light">Modifier</a>
                    <a href="index.php?p=support.supprimer&id=<?= $support['id'] ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>