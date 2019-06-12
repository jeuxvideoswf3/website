<?php
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $support = new Support(array(
            "id" => $id
        ));

        $supportManager = new SupportManager($bdd);
        if ($supportManager->delete($support)) {
            echo "Le support a été supprimé avec succès";
        } else {
            echo "Une erreur est survenue lors de la suppression";
        }
    }