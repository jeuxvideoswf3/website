<?php
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $version = new Version(array(
            "id" => $id
        ));

        $versionManager = new VersionManager($bdd);
        if ($versionManager->delete($version)) {
            echo "La version a été supprimée avec succès";
        } else {
            echo "Une erreur est survenue lors de la suppression";
        }
    }
?>