<p>tout les appareille</p>
<?php

if(isset($_GET['product']))
{
    $id = $_GET['product'];
    $products = $categorie->item($id);
    echo '<pre>';
    print_r($products);
    echo '<pre>';
}
?>
