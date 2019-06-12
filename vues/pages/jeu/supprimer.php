<?php
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $jeu = new Jeu(array(
            "id" => $id
        ));

        $jeuManager = new JeuManager($bdd);
        if ($jeuManager->delete($jeu)) {
            echo "Le jeu a été supprimé avec succès <meta http-equiv=\"refresh\" content=\"3;URL=index.php?p=jeu.accueil\">";
        } else {
            echo "Une erreur est survenue lors de la suppression <meta http-equiv=\"refresh\" content=\"3;URL=index.php?p=jeu.accueil\">";
        }
    }
?>