<p>tout les appareille</p>
<?php

if(isset($_GET['product']))
{
    $id = $_GET['product'];
    $items = $products->listAll($id);
    echo '<pre>';
    print_r($items);
    echo '<pre>';

    foreach($items as $description)
    {
?>
<strong>Notre Gamme <?= $description['products_categorie']?> </strong>
<a href="index.php?view=item&product=<?= $description['products_id']?>"><?= $description['products_name']?></a>
<h3><?= $description['products_description']?></h3>
<h4><?= $description['products_price']?></h4>

<?php } };?>
}
?>
