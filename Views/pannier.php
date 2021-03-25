<p>pannier</p>
<?php

use App\Controller\ProductsController;
use App\Model\ProductsModel;

$product = new ProductsModel;
if (isset($_SESSION['pannier'])) {
    echo '<pre>';
    var_dump($_SESSION['pannier']);
    echo '<pre>';
    $id = array_keys($_SESSION['pannier']);
    var_dump($id);

    if (isset($_GET['del'])) {
        unset($cart_products[$_GET['products']]);
    }
    $total = 0;

?>
    <?php
    for ($s = 0; $s < count($id); $s++) {
        $cart_products = $product->byId($id[$s]);


        for ($i = 0; $i < count($cart_products); $i++) { ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom du produit</th>
                        <th scope="col">Description</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Prix total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><img class="card-img-top" width="50px" height="50px" src="Views/Public/Pictures/<?= $cart_products[$i]['ref'] ?>.jpg"></th>
                        <td><?= $cart_products[$i]['products_name'] ?></td>
                        <td><?= $cart_products[$i]['products_description'] ?></td>
                        <td><?= $cart_products[$i]['products_price'] ?></td>
                        <td><?= $cart_products[$i]['products_quantity'] ?><form method="POST" action="index.php?view=panier"><input type="submit" name="plus" value="+"></form>
                        </td>
                        <td><?= $total = $cart_products[$i]['products_price'] * $cart_products[$i]['products_quantity'] ?></td>
                        <td><span class="action">
                                <a href="index.php?view=pannier&del&products=<?= $cart_products[$i]['products_id'] ?>" class="del"><i class="bi bi-trash"></i></a>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
<?php }
    }
}
if (isset($_POST['delete'])) {
    session_destroy();
}
?>
<html>
<form method="POST">
    <input type="submit" name="delete" value="delete">
</form>

</html>