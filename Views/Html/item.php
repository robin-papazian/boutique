<?php

if (isset($_GET['product'])) {
    $id = $_GET['product'];
    $name = $_GET['product'];
    if (is_numeric($id)) {
        $item = $product->byId($id);
    } else {
        $item = $product->byName($name);
    }



    foreach ($item as $_SESSION['panier']) { ?>
        <div class="m-5 bg-dark">

            <div class="d-flex">
                <img class="m-2" src="Views/Public/Pictures/<?= mydir("Views/Public/Pictures", $_SESSION['panier']['products_name']) ?>">
                <div>
                    <h1 class="d-flex justify-content-center text-light"><?= $_SESSION['panier']['products_name'] ?></h1>
                    <p class="text-light">
                        Description : <br /><?= $_SESSION['panier']['products_description'] ?><br />
                        Prix : <?= $_SESSION['panier']['products_price'] ?> €

                    </p>
                    <form method='post' action='index.php?view=item&product=<?= $_SESSION['panier']['products_id'] ?>'>
                        <input type='number' name='nbrproduit' placeholder="Nombre de produits" value="1" min="1">
                        <input class="btn btn-primary" type='submit' name='addtocart' value="Ajouter au panier">
                    </form>
                </div>
            </div>
        <?php
    }; ?>
    <?php
};
    ?>
    <?php
    if (isset($_POST['addtocart'])) {
        $_SESSION['panier']['products_quantity'] = $_POST['nbrproduit'];
    }
    ?>