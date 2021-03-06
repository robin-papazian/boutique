

<?php
session_start();

require('App/Libraries/Autoload.php');

spl_autoload_register('autoload');



// $product = new App\Controller\ProductsController;
// $categorie = new App\Controller\CategoriesController;

$controler = new App\Controller\UsersController;





if(isset($_GET['view']))
{
    $view = $_GET['view'];
    
    if($view == "index")
    {
        $controler->testation();
        // $data = $categorie->list();
        // $user->render($view,['data' => $data]);
    }
    elseif($view == "inscription")
    {
       $controler->inscription();
    }
    elseif($view == "connexion")
    {
      
        $controler->connexion();
        
    }
    elseif($view == "account")
    {
        
        $controler->account();
    }
    elseif($view == "products")
    {
        // $products = new App\Controller\ProductsController;
        // $user->render($view,['products' => $products]);
        
    }
    elseif($view == "item")
    {
        // $product = new App\Controller\ProductsController;
        // $user->render($view,['product' => $product]);
    }
    elseif($view == "pannier")
    {
        // $product = new App\Controller\ProductsController;
        // $user->render($view,['product' => $product]);
    }
    else
    {
        $user->render('404');
    }
}
else
{
    $controler->testation();
    // $data = $categorie->list();
    // $user->render('index',['data' => $data]);

}


?>