<?php
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $editeur = new Editeur(array(
            "id" => $id
        ));

        $editeurManager = new EditeurManager($bdd);
        if ($editeurManager->delete($editeur)) {
            echo "L'éditeur a été supprimé avec succès";
        } else {
            echo "Une erreur est survenue lors de la suppression";
        }
    }