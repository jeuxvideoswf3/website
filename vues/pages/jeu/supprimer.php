<?php
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $jeu = new Jeu(array(
            "id" => $id
        ));

        $jeuManager = new JeuManager($bdd);
        if ($jeuManager->delete($jeu)) {
            echo "Le jeu a été supprimé avec succès";
        } else {
            echo "Une erreur est survenue lors de la suppression";
        }
    }
?>