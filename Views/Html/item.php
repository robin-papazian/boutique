<?php

if (isset($_GET['product'])) {
    $id = $_GET['product'];
    $name = $_GET['product'];
    if (is_numeric($id)) {
        $item = $product->byId($id);
    } else {
        $item = $product->byName($name);
    }

    foreach ($item as $product) { ?>
        <div style='border:solid grey 1px; '>
            Home/<?= $product['products_categorie'] ?>/<?= $product['products_name'] ?>
            <h1 style='border-bottom:solid black 1px;'><?= $product['products_name'] ?></h1>
            <div style='border:solid brown; display:flex'>
                <img style='border:solid blue;' src="Views/Public/Pictures/<?= mydir("Views/Public/Pictures", $product['products_name']) ?>">
                <div>
                    <p style='border:solid purple;'>
                        Fiche technique : <br /><?= $product['products_description'] ?><br />
                        Prix : <?= $product['products_price'] ?> €

                    </p>
                    <form method='post' action='index.php?view=item&product=<?= $product['products_id'] ?>'>
                        <input type='hidden' name='produit' placeholder="Nombre de produits" value="<?= $product['products_id'] ?>">
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
        $_SESSION['panier'][$_POST['produit']] = $_POST['nbrproduit'];

        echo '<pre>';
        var_dump($_SESSION['panier']);

        echo '</pre>';
    }


    ?>