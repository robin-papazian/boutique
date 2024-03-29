<?php

if (isset($_GET['detail'])) {
    $ref = $_GET['detail'];

    $order = $orders->listBy("INNER JOIN paniers ON products.products_id = paniers.paniers_product WHERE paniers_ref = $ref");

    $total = 0;
}

?>
<div class="bg-image-2">
    <div class='d-flex justify-content-center'>
        <div class="card m-5" style="width: 18rem;">
            <div class='d-flex'>
                <div>
                    <div class="card-header">
                        <strong>Commande</strong>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($order as $detail) : ?>
                            <li class="list-group-item"><strong><?= $detail['products_name'] ?></strong> × <?= $detail['paniers_quantity'] ?> </li>
                        <?php endforeach; ?>
                        <li class="list-group-item">Paiment :</li>
                        <li class="list-group-item">Total :</li>
                    </ul>
                </div>
                <div>
                    <div class="card-header">
                        <strong>Détail</strong>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($order as $detail) : $total += $detail['products_price'] * $detail['paniers_quantity'] ?>
                            <li class="list-group-item"><?= $detail['products_price'] * $detail['paniers_quantity'] ?> €</li>
                        <?php endforeach; ?>
                        <li class="list-group-item">Carte Bleu</li>
                        <li class="list-group-item"><?= $total ?> €</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>