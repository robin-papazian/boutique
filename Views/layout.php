<?php
$products = new App\Controller\ProductsController;
if (isset($_SESSION['droit']) && $_SESSION['droit'] == '42') {
    $link = '<a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Dashbord
                </a>';
} else {
    $link = '<a class="nav-link" href="#">Contact</a>';
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="http://localhost/boutique/Views/Public/Css/style.css" type="text/css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto justify-content-around" style=' width: 100%;'>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?view=index">Home</a>
                    </li>
                    <form class="form-inline my-2 my-lg-0" method='get' action='#'>
                        <input type='hidden' name='view' value='item'>
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" list='products' name='product'>
                        <datalist id="products">
                            <?= $products->autocompletion() ?>

                        </datalist>

                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Envoyer</button>
                    </form>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mon Compte
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="index.php?view=connexion">Connexion</a>
                            <a class="dropdown-item" href="index.php?view=inscription">Inscription</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php?view=panier">Panier</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <?= $link ?>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="collapse" id="collapseExample">
            <nav class="nav">
                <a class="nav-link active" href="index.php?view=manage_Categorie">Categories</a>
                <a class="nav-link" href="index.php?view=manage_Products">Products</a>
                <a class="nav-link" href="index.php?view=manage_Users">Users</a>
            </nav>
        </div>
    </header>
    <?= $PageContent ?>
    <footer>
        <p>Copyright © 2021 | Pierro | Robino</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>