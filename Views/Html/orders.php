<?php

if (isset($_GET['detail'])) 
{
    $id = $_GET['detail'];
    
    $b = $orders->listBy("WHERE paniers_ref = $id");

    echo '<pre>';
    var_dump($b);
    echo '</pre>';
}

?>