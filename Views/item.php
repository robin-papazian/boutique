<?php

if(isset($_GET['product']))
{
    $id = $_GET['product'];
    $item = $product->description($id);
    echo '<pre>';
    print_r($item);
    echo '<pre>';
    
    foreach($item as $description)
    {?>
    <div style='border:solid grey 1px; '>
        Home/<?=$description['products_categorie']?>/<?=$description['products_name']?>
        <h1 style='border-bottom:solid black 1px;'><?=$description['products_name']?></h1>
        <div style='border:solid brown; display:flex'>
            <img style='border:solid blue;' src="Views/Public/Pictures/<?=$description['ref']?>.jpg">
            <div>
            <p style='border:solid purple;'>
                Fiche technique : <br/><?=$description['products_description']?><br/>
                Prix : <?=$description['products_price']?> € 
        
            </p>
            <form method='post' action='index.php?view=item&product=<?= $description['products_id']?>' >
            <label for='nbrproduit'>
                <input type='number' name='nbrproduit'>
            </label>
                <input type='submit' name='submit'>
            </form>
            </div>
        </div>
    </div>
    <?php 
    }; ?>
<?php
};
?>
<?php 

var_dump($description);

if(isset($_POST['nbrproduit']))
{
    $_SESSION['pannier'][$description['products_id']] = $_POST['nbrproduit'];
}


?>

