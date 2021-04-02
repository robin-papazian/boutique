<?php

if (isset($_GET['product'])) {
    $id = $_GET['product'];
    $name = $_GET['product'];
    if (is_numeric($id)) {
        $item = $product->byId($id);
    } else {
        $item = $product->byName($name);
    }

    echo '<pre>';
    print_r($item);
    echo '<pre>';

    foreach ($item as $_SESSION['panier']) { ?>
        <div style='border:solid grey 1px; '>
            Home/<?= $_SESSION['panier']['products_categorie'] ?>/<?= $_SESSION['panier']['products_name'] ?>
            <h1 style='border-bottom:solid black 1px;'><?= $_SESSION['panier']['products_name'] ?></h1>
            <div style='border:solid brown; display:flex'>
                <img style='border:solid blue;' src="Views/Public/Pictures/<?= mydir("Views/Public/Pictures", $_SESSION['panier']['products_name']) ?>">
                <div>
                    <p style='border:solid purple;'>
                        Fiche technique : <br /><?= $_SESSION['panier']['products_description'] ?><br />
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