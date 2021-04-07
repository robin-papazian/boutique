<h5 class="d-flex justify-content-center">Panier</h5>


<div class="d-flex m-5">
    <table class="table bg-dark">
        <thead>
            <tr>
                <th class="text-light" scope="col">#</th>
                <th class="text-light" scope="col">Nom du produit</th>
                <th class="text-light" scope="col">Description</th>
                <th class="text-light" scope="col">Prix</th>
                <th class="text-light" scope="col">Quantité</th>
                <th class="text-light" scope="col">Prix total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $gran_total = 0;
            ?>
            <tr>
                <?php foreach ($panier as $product) : ?>
                    <th scope="row"><img style="width: 20%;" class="card-img-top img-fluid" src='Views/Public/Pictures/<?= mydir("Views/Public/Pictures/", $product['products_name']) ?>'></th>
                    <td class="text-light"><?= $product['products_name'] ?></td>
                    <td class="text-light"><?= $product['products_description'] ?></td>
                    <td class="text-light"><?= $product['products_price'] ?>.00€</td>
                    <td class="text-light"><?= $_SESSION['panier'][$product['products_id']] ?></td>
                    <td class="text-light">
                        <?php
                        $total = $_SESSION['panier'][$product['products_id']] * $product['products_price'];
                        $gran_total += $total;
                        echo $total;
                        $_SESSION['order'] = $total;
                        ?>
                        .00€</td>
                    <td>
                        <form method='post'>
                            <input type='hidden' name='product' value='<?= $product['products_id'] ?>'>
                            <input class="btn btn-danger" type="submit" name="delete" value="delete">
                        </form>
                    </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <th class="text-light">Prix du panier</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-light"><?= $gran_total ?>.00€</td>
            <td>
                <form method="POST" action="index.php?view=payment">
                    <label for="prix"></label>
                    <input type="hidden" id="prix" name="prix" value="<?= $gran_total ?>">
                    <button class="btn btn-success">Commander</button>
                </form>
            </td>

        </tr>
        </tbody>
    </table>
</div>