<?php

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
        
        default:
            # code...
            break;
    }
    $content = ob_get_clean();
    require './vues/template.php';