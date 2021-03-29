<p>pannier</p>

<?php

use App\Controller\ProductsController;
use App\Model\ProductsModel;


$product = new ProductsModel;
if (isset($_SESSION['panier'])) {
    $id = array_keys($_SESSION['panier']);
    if (isset($_POST['delete'])) {
        unset($_SESSION['panier']);
        unset($id);
    }
    $total = 0;
    $gran_total = 0;
    $cart_products_quantity = [];

    if (isset($_SESSION['panier'])) {
        for ($s = 0; $s < count($id); $s++) {
            $cart_products = $product->byId($id[$s]);
            $cart_products_quantity = $_SESSION['panier'][$id[$s]];
            if (isset($_POST['change'])) {
                $cart_products_quantity = $_POST['new_quantity'];
            }
            if (isset($_POST['change'])) {
                $_SESSION['panier'][$id[$s]] = $_POST['new_quantity'];
            }
?>
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
                        <th scope="row"><img class="card-img-top img-fluid" src="Views/Public/Pictures/<?= $cart_products[0]['ref'] ?>.jpg"></th>
                        <td><?= $cart_products[0]['products_name'] ?></td>
                        <td><?= $cart_products[0]['products_description'] ?></td>
                        <td><?= $cart_products[0]['products_price'] ?>.00€</td>
                        <td>
                            <form method="POST">
                                <input type="number" name="new_quantity"><?= $cart_products_quantity ?>
                                <input type="submit" name="change" value="Modifier la quantité">
                            </form>
                        </td>
                        <td><?= $total = $cart_products_quantity * $cart_products[0]['products_price'] ?>.00€</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>Prix du panier</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?= $gran_total += $total ?>.00€</td>
                    </tr>
                </tbody>
            </table>
<?php

        }
    }
}

?>
<html>
<form method="POST">
    <input type="submit" name="delete" value="Vider le panier">
    <html>

    <head>
        <title>Buy cool new product</title>
        <script src="https://js.stripe.com/v3/"></script>
    </head>

    <body>
        <button id="checkout-button">Checkout</button>
    </body>
</form>

</html>