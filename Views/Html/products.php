<h5 class="d-flex justify-content-center">Tout les produits</h5>
<?php

if (isset($_GET['product_categorie'])) {
    $id = $_GET['product_categorie'];
    $items = $product->byCategorie($id);

?>
    <div class="d-flex justify-content-around">
        <?php
        foreach ($items as $description) {  ?>
            <div class='card bg-dark' style='width: 18rem;'>
                <img src='Views/Public/Pictures/<?= mydir("Views/Public/Pictures", $description['products_name']) ?>' class='card-img-top' alt='product jpg'>
                <div class='card-body'>
                    <h5 class='card-title text-light'><?= $description['products_name'] ?></h5>
                    <a class="text-light" href="index.php?view=item&product=<?= $description['products_id'] ?>">Voir le produit</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

<?php
} ?>