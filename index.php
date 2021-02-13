

<?php

require('Model/Autoload.php');

spl_autoload_register('autoload');


//require('Controller/controller.php');
$model = new Controller\Controller;





if(isset($_GET['view']))
{
    $view = $_GET['view'];
    if($view == "index")
    { 
        $model->render('index');
    }

    elseif($view == "inscription")
    {   
        $data = $model->inscriptio();
        $model->render('inscription',['data' => $data]);
        
    }
    elseif($view == "connexion")
    {
        $model->render('connexion');
    }
    elseif($view == "account")
    {
        $model->render('account');
    }
    elseif($view == "categories")
    {
        $model->render('categorie');
    }
    else
    {
        $model->render('404');
    }
}
else
{
    $model->render('index');

}


?>