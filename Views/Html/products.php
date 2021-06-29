<?php

if (isset($_GET['product_categorie'])) {
    $id = $_GET['product_categorie'];
    $items = $product->byCategorie($id);
    $count = 0;
}
?>

<h5 class="d-flex justify-content-center">Tout les produits</h5>

<section class="container-card">

    <?php foreach ($items as $description) : ?>

        <div class="card">
            <img src='Views/Public/Pictures/<?= mydir("Views/Public/Pictures", $description['products_name']) ?>' class="card-image">
            <div class="card-text">
                <span class="price">

                    <?= $description['products_price'] ?>

                    &euro;</span>
                <h2><?= $description['products_name'] ?></h2>
                <!-- <p>DESCRIPTION</p> -->
            </div>
            <a href="index.php?view=item&product=<?= $description['products_id'] ?>" class="btn-card">VOIR LE PRODUIT</a>
        </div>
    <?php endforeach; ?>
</section>