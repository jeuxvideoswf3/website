<?php
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $version = new Version(array(
            "id" => $id
        ));

        $versionManager = new VersionManager($bdd);
        if ($versionManager->delete($version)) {
            echo "La version a été supprimée avec succès <meta http-equiv=\"refresh\" content=\"3;URL=index.php?p=version.accueil\">";
        } else {
            echo "Une erreur est survenue lors de la suppression <meta http-equiv=\"refresh\" content=\"3;URL=index.php?p=version.accueil\">";
        }
    }
?>