

<?php
session_start();

require('App/Libraries/Autoload.php');

spl_autoload_register('autoload');



// $product = new App\Controller\ProductsController;
// $categorie = new App\Controller\CategoriesController;

$user = new App\Controller\UsersController;
$categorie = new App\Controller\CategoriesController;
$products = new App\Controller\ProductsController;





if (isset($_GET['view'])) {
    $view = $_GET['view'];

    if ($view == "index") {
        $categorie->index();
        // $data = $categorie->list();
        // $user->render($view,['data' => $data]);
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
        // $product = new App\Controller\ProductsController;
        $user->render($view);
    } elseif ($view == "payment") {
        $user->render($view);
    } else {
        $user->render('404');
    }
} else {
    $categorie->index();
    // $data = $categorie->list();
    // $user->render('index',['data' => $data]);

}


?>