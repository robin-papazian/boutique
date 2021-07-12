<?php


require('App/Libraries/Autoload.php');
spl_autoload_register('autoload');



if (isset($_POST)) {
    $model = new App\Controller\ProductsController;
    $string = implode(' ', $_POST);
    $products = $model->autocompletions($string);
}



echo json_encode($products);
