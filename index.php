

<?php
session_start();

require('App/Libraries/Autoload.php');

spl_autoload_register('autoload');


$user = new App\Controller\UsersController;
$product = new App\Controller\ProductsController;





if(isset($_GET['view']))
{
    $view = $_GET['view'];
    
    if($view == "index")
    {
        $data = $product->acceuil();
        $user->render($view,['data' => $data]);
    }
    elseif($view == "inscription")
    {
       
        $data = $user->getColumnsName($_POST);
        $form = $user->inscription($data);
        $user->render($view,['form' => $form]);
    }
    elseif($view == "connexion")
    {
      
        $data = $user->getColumnsName($_POST);
        $form = $user->connexion($data);
        $user->render($view,['form' => $form]);
        
    }
    elseif($view == "account")
    {
        $data = $user->getColumnsName($_POST);
        $form = $user->account($data);
        $user->render($view);
    }
    elseif($view == "categories")
    {
        $control->render($view);
    }
    else
    {
        $control->render('404');
    }
}
else
{
    $control->render('index');

}


?>