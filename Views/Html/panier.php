<p>pannier</p>

    

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
        <?php
        $gran_total = 0;
        var_dump($_SESSION['login']);
        ?>
            <tr>
                <?php foreach($panier as $product) : ?>
                <th scope="row"><img class="card-img-top img-fluid" src='Views/Public/Pictures/<?= mydir("Views/Public/Pictures/",$product['products_name'])?>'  ></th>
                <td><?= $product['products_name'] ?></td>
                <td><?= $product['products_description'] ?></td>
                <td><?= $product['products_price'] ?>.00€</td>
                <td><?= $_SESSION['panier'][$product['products_id']] ?></td>
                <td>
                    <?php
                        $total = $_SESSION['panier'][$product['products_id']] * $product['products_price'];
                        $gran_total += $total;
                        echo $total;
                    ?>
                    .00€</td>
                <td>
                    <form method='post'>
                        <input type='hidden' name='product' value='<?= $product['products_id']?>'>
                        <input type="submit" name="delete" value="delete">
                    </form>
                </td>
            </tr>
            <?php endforeach;?>
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
                <td><?= $gran_total ?>.00€</td>
                <td>
                    <form method="POST" action="index.php?view=payment">
                        <label for="prix"></label>
                            <input type="hidden" id="prix" name="prix" value="<?= $gran_total ?>">
                            <button>Procéder au paiement</button>
                    </form>
                </td>
                   
            </tr>
        </tbody>
       
    </table>


