<?php

if (isset($_GET['product'])) {
    $id = $_GET['product'];
    $name = $_GET['product'];
    if (is_numeric($id)) {
        $item = $product->byId($id);
    } else {
        $item = $product->byName($name);
    }
?>
    <div class="container-product margin-auto">
        <div style="margin:auto; border:solid green;">
            <img src="Views/Public/Pictures/aspirateur.jpg" alt="" class="margin-auto">
        </div>
        <div class="box-product ">
            <div class="im lh-first" style="border: solid blue;">
                <span>Catgeorie</span>
                <h3>Nom du produit</h3>
            </div>

            <span class="im">50,00 &euro; </span>

            <form action="">

                <!-- en flex -->
                <input type="number" name="" id="" class="btn-nb">
                <input type="submit" name="" id="" class="btn-product" value="ajouter">
            </form>
            <div class="im-bg">
                <h4>Description</h4>
                <p class="im lh-medium">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Numquam quos quisquam reiciendis voluptatem, animi nihil provident dolores dicta laborum vel. Voluptate earum eos quibusdam quam, et illo voluptates numquam culpa?</p>
            </div>

        </div>
    </div>
    <div class="d-flex justify-content-around">
        <?php
        foreach ($item as $product) { ?>
            <div class="bg-dark rounded">
                <h1 class="text-light"><?= $product['products_name'] ?></h1>
                <div class="d-flex">
                    <img class="m-2 rounded" src="Views/Public/Pictures/<?= mydir("Views/Public/Pictures", $product['products_name']) ?>">
                    <div class="d-flex flex-column">
                        <p class="text-light m-5">
                            Description : <br /><?= $product['products_description'] ?><br />
                        </p>
                        <h5 class="text-light m-5">Prix : <?= $product['products_price'] ?> €
                        </h5>

                        <form class="m-5" method='post' action='index.php?view=item&product=<?= $product['products_id'] ?>'>
                            <input type='hidden' name='produit' placeholder="Nombre de produits" value="<?= $product['products_id'] ?>">
                            <input type='number' name='nbrproduit' placeholder="Nombre de produits" value="1" min="1">
                            <input class="btn btn-primary" type='submit' name='addtocart' value="Ajouter au panier">
                        </form>
                    </div>
                </div>
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
}


?>