<?php

if(isset($_GET['product']))
{
    $id = $_GET['product'];
    $item = $product->item($id);
    echo '<pre>';
    print_r($item);
    echo '<pre>';
    foreach($item as $description)
    {
?>
<h1><?= $description['products_name']?> </h1>
<?php } }?>

