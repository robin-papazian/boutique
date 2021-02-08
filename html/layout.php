<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/reservation-salles/css/style.php" type="text/css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet"> 
    <head>
<body>
    <header class="d-flex p-3 flex-column bg-dark">
        <h1 class="mr-auto text-white">Breaking Office</h1>
        <nav class="navbar navbar-expand-sm justify-content-center my-3">
            <ul class="navbar-nav list-unstyled">
                <li><a href="index.php?view=index" class="nav-link">Acceuil</a></li>
                <li><a href='index.php?view=inscription' class="nav-link">inscription</a></li>
                <li><a href='index.php?view=connexion' class="nav-link">Connexion</a></li>
                <li><a href='index.php?view=categories'>Catalogue</a></li>
                <li><a href='index.php?view=account'>Mon compte</a></li>
            </ul>
        </nav>
    </header>
    <?= $PageContent ?>
    <footer>
        <p>Copyright © 2021 | Robin</p>
    </footer>
</body>