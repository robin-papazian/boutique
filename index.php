

<?php
session_start();

require('App/Libraries/Autoload.php');
require('App/Libraries/Myupload.php');
require('App/Libraries/Mydir.php');
require('App/Libraries/Autoprepare.php');
spl_autoload_register('autoload');

$user = new App\Controller\UsersController;
$categorie = new App\Controller\CategoriesController;
$products = new App\Controller\ProductsController;





if (isset($_GET['view'])) {
    $view = $_GET['view'];

    if ($view == "index") {
        $categorie->index();
    } elseif ($view == "inscription") {
        $user->inscription();
    } elseif ($view == "connexion") {
        $user->connexion();
    } elseif ($view == "account") {
        $user->account();
    } elseif ($view == "products") {
        $products->product();
    } elseif ($view == "item") {
        $products->item();
    } elseif ($view == "panier") {
        $products->panier();
    } elseif ($view == "manage_Categorie") {
        $categorie->manageCategorie();
    } elseif ($view == "manage_Products") {
        $products->manageProduct();
    } elseif ($view == "manage_Users") {
        $user->manageUser($view);
    } elseif ($view == "payment") {
        $user->render($view);
    } else {
        $user->render('404');
    }
} else {
    $categorie->index();
}


?>