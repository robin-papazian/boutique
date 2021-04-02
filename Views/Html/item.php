<?php

if (isset($_GET['product'])) {
    $id = $_GET['product'];
    $name = $_GET['product'];
    if(is_numeric($id))
    {
        $item = $product->byId($id);
    }
    else
    {
        $item = $product->byName($name);
    }
   
    echo '<pre>';
    print_r($item);
    echo '<pre>';
<<<<<<< HEAD:Views/Html/item.php
    
    foreach($item as $description)
    {?>
    <div style='border:solid grey 1px; '>
        Home/<?=$description['products_categorie']?>/<?=$description['products_name']?>
        <h1 style='border-bottom:solid black 1px;'><?=$description['products_name']?></h1>
        <div style='border:solid brown; display:flex'>
            <img style='border:solid blue;' src="Views/Public/Pictures/<?=mydir("Views/Public/Pictures",$description['products_name'])?>">
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
=======

    foreach ($item as $description) { ?>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top image-thumbnail" src="Views/Public/Pictures/<?= $description['ref'] ?>.jpg">
            <div class="card-body">
                <h5 class="card-title"><?= $description['products_name'] ?></h5>
                <p class="card-text"><?= $description['products_description'] ?></p>
                <p class="card-text"><?= $description['products_price'] ?>.00€</p>

>>>>>>> 1a8bb9fdcdb4e25eb132a72474e02279445319bb:Views/item.php
            </div>
            <form method='post' action='index.php?view=item&product=<?= $description['products_id'] ?>'>
                <input type='number' name='nbrproduit' placeholder="Nombre de produits" value="1" min="1">
                <input class="btn btn-primary" type='submit' name='submit' value="Ajouter au panier">
            </form>
        </div>

    <?php
    }; ?>
<?php
};
?>
<?php
if (isset($_POST['nbrproduit'])) {
    $_SESSION['panier'][$description['products_id']] = $_POST['nbrproduit'];
}


?>