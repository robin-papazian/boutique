<?php
$users = new App\Controller\UsersController;
$products = new App\Controller\ProductsController;
$orders = new App\Controller\PaniersController;




if (isset($_SESSION['droit']) && $_SESSION['droit'] == '42') {
    $admin = '<div class="dropdown-divider"></div><a class="dropdown-item btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Dashbord
                </a>';
} else {
    $admin = '';
} ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://kit.fontawesome.com/9ddb75d515.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Views/Public/Css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">


</head>

<body>
    <header>
        <div class="single-service text-center">
            <i class="fa fa-home"></i>
            <h3>Tout Pour La Maison</h3>
            <hr>
            <p>Des appareilles menager concu pour durer,
                Pour une maison plus saine ...</p>

        </div>
        <nav class="navbar navbar-expand-lg  ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fas fa-bars" style="color:#fff; font-size:28px;"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto" style="text-align:center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ESPACE
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if (isset($_SESSION['login'])) : ?>
                                <a class="dropdown-item " href="index.php?view=account">Profil</a>
                                <a class="dropdown-item " href="index.php?view=historique">Historique d'achat</a>
                                <a class="dropdown-item " href="index.php?view=deconection">Déconnecter</a>
                                <a class="dropdown-item" href="index.php?view=panier">Panier <span><?= $orders->itemSelected() ?><i class="bi bi-basket"></i></span></a>
                            <?php else : ?>
                                <button class="dropdown-item" id="modal-connexion">Connexion</button>
                                <button class="dropdown-item" id="modal-inscription">Inscription</button>
                                <a class="dropdown-item" href="index.php?view=panier">Panier <span><?= $orders->itemSelected() ?><i class="bi bi-basket"></i></span></a>
                            <?php endif; ?>
                            <?= $admin ?>
                        </div>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div class="collapse" id="collapseExample">
                <nav class="nav">
                    <a class="nav-link active" href="index.php?view=manage_Categorie">Categories</a>
                    <a class="nav-link" href="index.php?view=manage_Products">Products</a>
                    <a class="nav-link" href="index.php?view=manage_Users">Users</a>
                </nav>
            </div>
        </nav>

    </header>
    <?= $PageContent ?>
    <footer class="footer">
        <div class="container-footer">
            <div class="b-row">
                <div class="footer-col">
                    <h4>Tout Pour la Maison</h4>
                    <ul>
                        <li><a href="#">à propos</a></li>
                        <li><a href="#">nos services</a></li>
                        <li><a href="#">données personnel</a></li>
                        <li><a href="#">affiliation</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>aide</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">expédition</a></li>
                        <li><a href="#">Politique de retour</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Réseaux sociaux</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div id="robinSimpleModal" class="robin-modal">
        <div class="modal-content">
            <div class="modalHeader">
                <span class="closeBtn">&times;</span>
                <h3>Inscription</h3>

            </div>
            <form class="modalBody" id='formI'>

                <div class="card-body">
                    <div class="row">
                        <div class="col"> <label for='users_name' class="form-control-label text-muted"></label> <input type="text" name="users_name" id='users_name' placeholder="Prénom" class="form-control" required> </div>
                        <div class="col"> <label for='users_familly_name' class="form-control-label text-muted"></label> <input type="text" name="users_familly_name" placeholder="Nom" class="form-control" required> </div>
                    </div>
                    <div class="row">
                        <div class="col"> <label for='users_login' class="form-control-label text-muted"></label> <input type="text" name="users_login" placeholder="Login" class="form-control" required> </div>
                        <div class="col"> <label for='users_password' class="form-control-label text-muted"></label> <input type="password" name="users_password" placeholder="Mot de passe" class="form-control" required> </div>
                    </div>
                    <div class="form-group"> <label for='users_email' class="form-control-label text-muted"></label> <input type="mail" name="users_email" placeholder="Email" class="form-control" required> </div>
                    <div class="form-group"> <label for='users_street' class="form-control-label text-muted"></label> <input type="text" name="users_street" placeholder="Rue" class="form-control" required> </div>
                    <div class="row">
                        <div class="col"> <label for='users_post_code' class="form-control-label text-muted"></label> <input type="number" name="users_post_code" placeholder="Code Postale" class="form-control" required> </div>
                        <div class="col"> <label for='users_town' class="form-control-label text-muted"></label> <input type="text" name="users_town" placeholder="Ville" class="form-control" required> </div>
                    </div>
                    <div class="d-flex justify-content-center am"><button name='submit' class="btn-product" id='register'>S'inscrire</button></div>
                </div>

            </form>
        </div>
    </div>

    <div id="ModalConnexion" class="robin-modal">
        <div class="modal-content">
            <div class="modalHeader">
                <span class="closeBtn" id='closeCo'>&times;</span>
                <h3>Connexion</h3>
            </div>
            <form class="modalBody" id='formC'>
                <div class="card-body">
                    <div class="row">
                        <div class="col"> <label for='users_login' class="form-control-label text-muted"></label> <input type="text" name="users_login" placeholder="Login" class="form-control" required> </div>
                        <div class="col"> <label for='users_password' class="form-control-label text-muted"></label> <input type="password" name="users_password" placeholder="Mot de passe" class="form-control" required> </div>
                    </div>
                    <div class="d-flex justify-content-center am"><button name='submit' class="btn-product" id='connection'>Connexion</button></div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script type="text/javascript" src="Views/Public/Js/scripts.js"></script>


</body>

<?php



?>