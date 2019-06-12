<section class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Jeu</th>
                <th scope="col">Support</th>
                <th scope="col">Date de sortie</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $versionManager = new VersionManager($bdd);
                foreach($versionManager->read() as $version):
            ?>
            <tr>
                <th scope="row"><?= $version['id'] ?></th>
                <td><?= $version['titre'] ?></td>
                <td><?= $version['nom'] ?></td>
                <td><?= date('d/m/Y', strtotime($version['releasedate'])) ?></td>
                <td>
                    <a href="index.php?p=version.editer&id=<?= $version['id'] ?>" class="btn btn-light">Modifier</a>
                    <a href="index.php?p=version.supprimer&id=<?= $version['id'] ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>