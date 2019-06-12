<?php
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $support = new Support(array(
            "id" => $id
        ));

        $supportManager = new SupportManager($bdd);
        if ($supportManager->delete($support)) {
            echo "Le support a été supprimé avec succès <meta http-equiv=\"refresh\" content=\"3;URL=index.php?p=support.accueil\">";
        } else {
            echo "Une erreur est survenue lors de la suppression <meta http-equiv=\"refresh\" content=\"3;URL=index.php?p=support.accueil\">";
        }
    }