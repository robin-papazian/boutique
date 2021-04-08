<?php

if (isset($_GET['detail'])) 
{
    $id = $_GET['detail'];
    
    $b = $orders->listBy("INNER JOIN paniers ON products.products_id = paniers.paniers_product WHERE paniers_ref = $id");

    echo '<pre>';
    var_dump($b);
    echo '</pre>';
}

?>