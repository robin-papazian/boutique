<h5 class="d-flex justify-content-center">Panier</h5>

    <?php 
        if(!isset($_SESSION['login']))
        {
            header('Location: index.php?view=connexion');
        }
    
    ?>

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
                    ?>
                    .00€</td>
                <td>
                    <form method='post'>
                        <input type='hidden' name='product' value='<?= $product['products_id']?>'>
                        <input class='btn btn-danger' type="submit" name="delete" value="delete">
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
                    <form method="post" >
                        
                        <button  type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#commander">
                            commander
                        </button>
                        <div class="modal fade" id="commander" tabindex="-1" aria-labelledby="commanderLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commanderLabel">Payer</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method='post' action='index.php?view=panier' id='payment'>
                                            <label for='name'>Nom
                                                <input type="text" class="form-control" name="name"  value="<?=$_SESSION['nom']?>" >
                                            </label>
                                            <label for='email'>Email    
                                                <input type="email" class="form-control" name="email"  value="<?=$_SESSION['email']?>" >
                                            </label>
                                            <label for='credit_card'>Numéro de carte 
                                                <input type="text" class="form-control" name="credit_card" value="42 42 42 42 42 42 42 42" data-stripe='number' >
                                            </label>
                                            <label for='card_month'>Mois d'expiration 
                                                <input type="text" class="form-control" name="card_month" value="10" data-stripe='exp_month' >
                                            </label>
                                            <label for='card_year'>Année d'expiration  
                                                <input type="text" class="form-control" name="card_year" value="2042" data-stripe='exp_year'>
                                            </label>
                                            <label for='card_cvc'>CVC   
                                                <input type="text" class="form-control" name="card_cvc" value="101" data-stripe='cvc'>
                                            </label>
                                            <label for='prix'>Prix  
                                                <input type="text" class="form-control" name="prix" value="<?=$gran_total?>.00€" data-stripe='prix'>
                                            </label>
                                                <input class="btn btn-success" type='submit' name='prix' value='Confirmer' id='confirmation_payment'>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Plus Tard</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        
                    </form>
                </td>
                       
                   
            </tr>
    </table>
</div>