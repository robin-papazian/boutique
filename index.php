

<?php
session_start();

require('App/Libraries/Autoload.php');

spl_autoload_register('autoload');


$user = new App\Controller\UsersController;
$product = new App\Controller\ProductsController;
$categorie = new App\Controller\CategoriesController;





if(isset($_GET['view']))
{
    $view = $_GET['view'];
    
    if($view == "index")
    {
        $data = $categorie->list();
        $user->render($view,['data' => $data]);
    }
    elseif($view == "inscription")
    {
       
        $data = $user->formScrapping($_POST);
        $form = $user->manage($view,$data);
        $user->render($view,['form' => $form]);
    }
    elseif($view == "connexion")
    {
      
        $data = $user->formScrapping($_POST);
        $form = $user->manage($view,$data);
        $user->render($view,['form' => $form]);
        
    }
    elseif($view == "account")
    {
        $data = $user->formScrapping($_POST);
        $form = $user->manage($view,$data);
        $user->render($view,['form' => $form]);
    }
    elseif($view == "products")
    {
        $products = new App\Controller\ProductsController;
        $user->render($view,['products' => $products]);
        
    }
    elseif($view == "item")
    {
        $product = new App\Controller\ProductsController;
        $user->render($view,['product' => $product]);
    }
    elseif($view == "pannier")
    {
        $product = new App\Controller\ProductsController;
        $user->render($view,['product' => $product]);
    }
    else
    {
        $user->render('404');
    }
}
else
{
    $data = $categorie->list();
    $user->render('index',['data' => $data]);

}


?>