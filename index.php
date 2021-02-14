

<?php

require('App/Libraries/Autoload.php');

spl_autoload_register('autoload');


$control = new App\Controller\Controller;





if(isset($_GET['view']))
{
    $view = $_GET['view'];
    if($view == "index")
    { 
        $control->render($view);
    }
    elseif($view == "inscription")
    {   
        $data = $control->inscription();
        $control->render($view,['data' => $data]);
        
    }
    elseif($view == "connexion")
    {
        $control->render($view);
    }
    elseif($view == "account")
    {
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