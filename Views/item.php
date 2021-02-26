<?php

if(isset($_GET['product']))
{
    $id = $_GET['product'];
    $item = $product->item($id);
    echo '<pre>';
    print_r($item);
    echo '<pre>';
    
}
?>
