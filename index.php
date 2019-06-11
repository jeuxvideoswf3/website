<?php

    require './inc/db.php';

    spl_autoload_register(function ($classe) {
        require_once 'classes/' . $classe . '.class.php';
    });

    if (isset($_GET['p'])) {
        $page = $_GET['p'];
    } else {
        $page = 'accueil';
    }

    ob_start();
    switch ($page) {
        case 'accueil':
            require './vues/pages/accueil.php';
            break;
        
            
        // Catégorie - Pauline
        case 'categorie.accueil':
            require './vues/pages/categorie/accueil.php';
            break;
        case 'categorie.ajouter':
            require './vues/pages/categorie/ajouter.php';
            break;
        case 'categorie.editer':
            require './vues/pages/categorie/editer.php';
            break;
        case 'categorie.supprimer':
            require './vues/pages/categorie/supprimer.php';
            break;
            
        // Éditeur
        case 'editeur.accueil':
            require './vues/pages/editeur/accueil.php';
            break;
        case 'editeur.ajouter':
            require './vues/pages/editeur/ajouter.php';
            break;
        case 'editeur.editer':
            require './vues/pages/editeur/editer.php';
            break;
        case 'editeur.supprimer':
            require './vues/pages/editeur/supprimer.php';
            break;
            
        // Jeu
        case 'jeu.accueil':
            require './vues/pages/jeu/accueil.php';
            break;
        case 'jeu.ajouter':
            require './vues/pages/jeu/ajouter.php';
            break;
        case 'jeu.editer':
            require './vues/pages/jeu/editer.php';
            break;
        case 'jeu.supprimer':
            require './vues/pages/jeu/supprimer.php';
            break;

        // Support - Pauline
        case 'support.accueil':
            require './vues/pages/support/accueil.php';
            break;
        case 'support.ajouter':
            require './vues/pages/support/ajouter.php';
            break;
        case 'support.editer':
            require './vues/pages/support/editer.php';
            break;
        case 'support.supprimer':
            require './vues/pages/support/supprimer.php';
            break;

        // Version
        case 'version.accueil':
            require './vues/pages/version/accueil.php';
            break;
        case 'version.ajouter':
            require './vues/pages/version/ajouter.php';
            break;
        case 'version.editer':
            require './vues/pages/version/editer.php';
            break;
        case 'version.supprimer':
            require './vues/pages/version/supprimer.php';
            break;
    }
    $content = ob_get_clean();
    require './vues/template.php';