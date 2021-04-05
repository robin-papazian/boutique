<?php
$products = new App\Controller\ProductsController;
if (isset($_SESSION['droit']) && $_SESSION['droit'] == '42') {
    $link = '<a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Dashbord
                </a>';
} else {
    $link = '<a class="nav-link text-light" href="#"><i class="bi bi-envelope-fill"> Contact</i></a>';
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

    <link rel="stylesheet" href="Views/Public/Css/style.css" type="text/css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
            <div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto justify-content-around " style=' width: 100%;'>
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="index.php?view=index"><i class="bi bi-house-door-fill"> Tout Pour La Maison</i></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-person-circle"> Mon Compte</i>
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-light" href="index.php?view=connexion">Connexion</a>
                            <a class="dropdown-item text-light" href="index.php?view=inscription">Inscription</a>
                        </div>
                    </li>
                    <li class="nav-item text-light">
                        <?= $link ?>
                    </li>
                    <form class="form-inline my-2 my-lg-0" method='get' action='#'>
                        <input type='hidden' name='view' value='item'>
                        <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search" list='products' name='product'>
                        <datalist id="products">
                            <?= $products->autocompletion() ?>

                        </datalist>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                    <li class="nav-item active"><a class="nav-link text-light" href="index.php?view=panier"><i class="bi bi-basket"> Panier</i></a></li>
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
    <footer class=" d-flex bg-secondary justify-content-center fixed-bottom">
        <p>Copyright © 2021 | Pierro | Robino</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script type="text/javascript" src="Views/Public/Js/scripts.js"></script>

</body>