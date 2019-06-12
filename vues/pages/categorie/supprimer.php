<?php
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $categorie = new Categorie(array(
            "id" => $id
        ));

        $categorieManager = new CategorieManager($bdd);
        if ($categorieManager->delete($categorie)) {
            echo "La catégorie a été supprimée avec succès";
        } else {
            echo "Une erreur est survenue lors de la suppression";
        }
    }