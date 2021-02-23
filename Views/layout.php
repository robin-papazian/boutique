<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="http://localhost/boutique/view/css/style.css" type="text/css">
    <head>
<body>
    <header>
        <nav >
            <ul>
                <li><a href="index.php?view=acceuil" >Acceuil</a></li>
                <li><a href='index.php?view=inscription'>inscription</a></li>
                <li><a href='index.php?view=connexion'>Connexion</a></li>
                <li><a href='index.php?view=categories'>Catalogue</a></li>
                <li><a href='index.php?view=account'>Mon compte</a></li>
            </ul>
        </nav>
    </header>
    <?= $PageContent ?>
    <footer>
        <p>Copyright © 2021 | Robin | Jarod</p>
    </footer>
</body>