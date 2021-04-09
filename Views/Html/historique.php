<div class="bg-image-2">
    <div class='d-flex justify-content-center'>
        <div class="card bg-secondary text-light m-5" style="width: 18rem;">
            <div class="card-header">
                Historique d'Achat
            </div>
            <ul class="list-group list-group-flush">
                <?php foreach ($commander as $date) : ?>
                    <li class="list-group-item"><a href='index.php?view=orders&detail=<?= $date['factures_id'] ?>'><?= $date['factures_date'] ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>