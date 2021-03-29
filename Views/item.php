<?php

if (isset($_GET['product'])) {
    $id = $_GET['product'];
    $item = $product->byId($id);
    echo '<pre>';
    print_r($item);
    echo '<pre>';

    foreach ($item as $description) { ?>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top image-thumbnail" src="Views/Public/Pictures/<?= $description['ref'] ?>.jpg">
            <div class="card-body">
                <h5 class="card-title"><?= $description['products_name'] ?></h5>
                <p class="card-text"><?= $description['products_description'] ?></p>
                <p class="card-text"><?= $description['products_price'] ?>.00€</p>

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