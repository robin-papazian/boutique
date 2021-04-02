<p>pannier</p>

<?php

use App\Controller\ProductsController;
use App\Model\ProductsModel;


$product = new ProductsModel;
if (isset($_SESSION['panier'])) {
    if (isset($_POST['delete'])) {
        unset($_SESSION['panier']);
        unset($id);
    }
    var_dump($_SESSION['panier']);
    $total = 0;
    $gran_total = 0;
    //for ($i = 0; $i < count($_SESSION['panier']); $i++) {
    if (isset($_POST['change'])) {
        $_SESSION['panier']['products_quantity'] = $_POST['new_quantity'];
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
                <th scope="row"><img class="card-img-top img-fluid" src="Views/Public/Pictures/<?= $_SESSION['panier']['ref'] ?>.jpg"></th>
                <td><?= $_SESSION['panier']['products_name'] ?></td>
                <td><?= $_SESSION['panier']['products_description'] ?></td>
                <td><?= $_SESSION['panier']['products_price'] ?>.00€</td>
                <td>
                    <form method="POST">
                        <input type="number" name="new_quantity"><?= $_SESSION['panier']['products_quantity'] ?>
                        <input type="submit" name="change" value="Modifier la quantité">
                    </form>
                </td>
                <td><?= $total = $_SESSION['panier']['products_quantity'] * $_SESSION['panier']['products_price'] ?>.00€</td>
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
//}

?>
<form method="POST">
    <input type="submit" name="delete" value="Vider mon panier">
</form>

<form method="POST" action="index.php?view=payment">
    <label for="prix">Prix :<?= $gran_total ?> </label>
    <input type="hidden" id="prix" name="prix" value="<?= $gran_total ?>">
    <button>Procéder au paiement</button>
</form>

