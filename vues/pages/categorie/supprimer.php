<?php
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $categorie = new Categorie(array(
            "id" => $id
        ));

        $categorieManager = new CategorieManager($bdd);
        if ($categorieManager->delete($categorie)) {
            echo "La catégorie a été supprimée avec succès <meta http-equiv=\"refresh\" content=\"3;URL=index.php?p=categorie.accueil\">";
        } else {
            echo "Une erreur est survenue lors de la suppression <meta http-equiv=\"refresh\" content=\"3;URL=index.php?p=categorie.accueil\">";
        }
    }