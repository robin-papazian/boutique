

<?php
session_start();

require('App/Libraries/Autoload.php');

spl_autoload_register('autoload');


$control = new App\Controller\UsersController;





if(isset($_GET['view']))
{
    $view = $_GET['view'];
    
    if($view == "index")
    {
        $control->render($view);
    }
    elseif($view == "inscription")
    {
       
        $data = $control->getColumnsName($_POST);
        $form = $control->inscription($data);
        $control->render($view,['form' => $form]);
    }
    elseif($view == "connexion")
    {
      
        $data = $control->form();
        $form = $control->connexion($data);
        $control->render($view,['form' => $form]);
        
    }
    elseif($view == "account")
    {
        $data = $control->form();
        $form = $control->account($data);
        $control->render($view);
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