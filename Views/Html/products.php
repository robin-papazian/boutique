<p>tout les appareille</p>
<?php

if(isset($_GET['product_categorie']))
{
    $id = $_GET['product_categorie'];
    $items = $product->byCategorie($id);
    echo '<pre>';
    print_r($items);
    echo '<pre>';

    foreach($items as $description)
    { ?>
        <div class='card' style='width: 18rem;'>
            <img src='Views/Public/Pictures/<?= mystring($description['products_name'])?>.jpg' class='card-img-top' alt='product jpg'>
            <div class='card-body'>
                <h5 class='card-title'><?=$description['products_name']?></h5>
                <a href="index.php?view=item&product=<?=$description['products_id']?>">Fiche Technique</a>
            </div>
        </div>
<?php 
    }
}?>
    



