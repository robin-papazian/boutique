<h2>Historique d'achat</h2>
<div class="container-product margin-auto">
    <div style="width: 100%; text-align:center">
        <?php foreach ($commander as $date) : ?>
            <li class="list-group-item"><a style='color: black' href='index.php?view=orders&detail=<?= $date['factures_id'] ?>'><?= $date['factures_date'] ?></a></li>
        <?php endforeach; ?>
    </div>

</div>