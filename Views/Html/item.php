<?php

if (isset($_GET['product'])) {
    $id = $_GET['product'];
    $name = $_GET['product'];
    if (is_numeric($id)) {
        $item = $product->byId($id);
    } else {
        $item = $product->byName($name);
    }
}
?>
<div class="container-product margin-auto">
    <?php foreach ($item as $product) : ?>
        <div style="margin:auto; ">
            <img src="Views/Public/Pictures/<?= mydir("Views/Public/Pictures", $product['products_name']) ?>" alt="">
        </div>
        <div class="box-product ">
            <div class="im lh-first">
                <h3><?= $product['products_name'] ?></h3>
            </div>

            <span class="im"><?= $product['products_price'] ?> &euro; </span>

            <form method='post' action='index.php?view=item&product=<?= $product['products_id'] ?>'>

                <input type='hidden' name='produit' value="<?= $product['products_id'] ?>">
                <input type="number" name='nbrproduit' class="btn-nb" value="1" min="1">
                <input type='submit' name='addtocart' class="btn-product" value="ajouter">
            </form>
            <div class="im-bg">
                <h4>Description</h4>
                <p class="im lh-medium"> <?= $product['products_description'] ?> </p>
            </div>

        </div>
    <?php endforeach; ?>
</div>

<?php
if (isset($_POST['addtocart'])) {
    $_SESSION['panier'][$_POST['produit']] = $_POST['nbrproduit'];
}
?>