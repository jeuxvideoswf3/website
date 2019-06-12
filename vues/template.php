<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Jeux-Vidéos.com</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/css/mdb.min.css" rel="stylesheet">
    </head>
    <body>

        <header>
            <!--Navbar-->
            <nav class="navbar navbar-expand-lg navbar-dark mdb-color darken-2 fixed-top scrolling-navbar">
                <div class="container">
                    <a class="navbar-brand" href="index.php">Jeux-Vidéos.com</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="basicExampleNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?p=categorie.accueil">Catégorie</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?p=editeur.accueil">Éditeur</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?p=jeu.accueil">Jeu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?p=support.accueil">Support</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?p=version.accueil">Version</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="container mt-5 pt-5">
            <?= $content ?>
        </main>

        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/js/mdb.min.js"></script>
        
    </body>
</html>