

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
    
    if($view == "acceuil")
    {
        $data = $product->list();
        $user->render($view,['data' => $data]);
    }
    elseif($view == "inscription")
    {
       
        $data = $user->formScrapping($_POST);
        $form = $user->inscription($data);
        $user->render($view,['form' => $form]);
    }
    elseif($view == "connexion")
    {
      
        $data = $user->formScrapping($_POST);
        $form = $user->connexion($data);
        $user->render($view,['form' => $form]);
        
    }
    elseif($view == "account")
    {
        $data = $user->formScrapping($_POST);
        $form = $user->account($data);
        $user->render($view);
    }
    elseif($view == "products")
    {
        $product = new App\Controller\ProductsController;
        $user->render($view,['product' => $product]);
    }
    elseif($view == "categories")
    {
        $data = $categorie->list();
        $user->render($view,['data' => $data]);
    }
    else
    {
        $user->render('404');
    }
}
else
{
    $user->render('index');

}


?>