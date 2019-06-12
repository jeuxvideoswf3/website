<?php
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $editeur = new Editeur(array(
            "id" => $id
        ));

        $editeurManager = new EditeurManager($bdd);
        if ($editeurManager->delete($editeur)) {
            echo "L'éditeur a été supprimé avec succès <meta http-equiv=\"refresh\" content=\"3;URL=index.php?p=editeur.accueil\">";
        } else {
            echo "Une erreur est survenue lors de la suppression <meta http-equiv=\"refresh\" content=\"3;URL=index.php?p=editeur.accueil\">";
        }
    }
?>