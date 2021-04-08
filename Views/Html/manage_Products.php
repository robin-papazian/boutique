<h1>Manage products</h1>

<?php

if (isset($_POST['submit']) && $_POST['submit'] == 'Envoyer') {
    echo Myupload('go');
    $data = autoprepare($_POST);
    $products->insertBy($data['colonnes'], $data['prepare'], $data['execute']);
} elseif (isset($_POST['submit']) && $_POST['submit'] == 'Delete') {
    $data = autoprepare($_POST);
    $ids = $data['colonnes'];
    $products->deleteBy("WHERE products_id IN $ids");
} elseif (isset($_POST['submit']) && $_POST['submit'] == 'Edit') {
    $data = autoprepare($_POST);
    $id = $data['execute']["products_id"];
    $products->updateBy($data['set'], "_id", $id, $data['execute']);
}


?>

<div style='width:50%;'>
    <form method='post' action='index.php?view=manage_Products' enctype="multipart/form-data">

        <div class='form_group mb-2'>
            <label for="products_categorie">Chose a categorie</label>
            <select class="form-control mb-3" aria-label=".form-select-lg example" name='products_categorie'>
                <?php
                $items = $categorie->listBy();
                foreach ($items as $choose) {
                    echo "<option value='" . $choose['categories_id'] . "'>" . $choose['categories_name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class='form_group mb-3'>
            <label for="products_name">Products Name</label>
            <input class="form-control" type="text" id='products_name' name='products_name' aria-describedby='categorie_block'>
            <small id="passwordHelpBlock" class="form-text text-muted">
                Le nom du produit apparaittra sur le site .
            </small>
        </div>
        <div class='form_group mb-2'>
            <label for="products_price">Products Price</label>
            <input class="form-control" type="text" id='products_price' name='products_price' aria-describedby='categorie_block'>
        </div>
        <div class="form-floating">
            <label for="product_description">Description</label>
            <textarea class="form-control" placeholder="Leave a comment here" name='products_description' id="product_description"></textarea>
        </div>
        <div class='form_group mb-2'>
            <label for="file">Upload Image</label>
            <input type="file" name="file" id="file">
        </div>
        <input type="submit" class="btn btn-primary mb-2" name='submit' value='Envoyer'>
    </form>
</div>

<div>
    <form method='post' action='index.php?view=manage_Products'>
        <?php

        $items = $products->listBy();
        $a = 0;
        foreach ($items as $form) {
            $a++; ?>
            <div class="form-check form-check-inline container-fluid d-flex justify-content-around">
                <input class="form-check-input" type="checkbox" id="products_id" name='<?= $form['products_id'] ?>'>
                <img src='Views/Public/Pictures/<?= mydir("Views/Public/Pictures", $form['products_name']) ?>' style='width: 150px'>
                <label class="form-check-label" for='<?= $form['products_id'] ?>'><?= $form['products_name'] ?></label>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target='#edit_product<?= $a ?>'>
                    Editer
                </button>
            </div>
        <?php }; ?>


        <input type="submit" class="btn btn-primary mb-5" name='submit' value='Delete'>
    </form>
</div>


<?php
$a = 0;
foreach ($items as $form) {
    $a++; ?>
    <div class="modal fade" id="edit_product<?= $a ?>" tabindex="-1" aria-labelledby="edit_productLabel<?= $a ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_productLabel<?= $a ?>"><?= $form['products_name'] ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method='post' action='index.php?view=manage_Products'>
                        <input type='hidden' name='products_id' value='<?= $form['products_id'] ?>'>
                        <label for=products_id></label>

                        <label for="products_name">Nom</label>
                        <input type="text" class="form-control" name="products_name" value='<?= $form['products_name'] ?>'>

                        <label for="products_price">Prix</label>
                        <input class="form-control" type="text" id='products_price' name='products_price' value='<?= $form['products_price'] ?> €'>

                        <label for="product_description">Description</label>
                        <textarea class="form-control" name='products_description' id="product_description"><?= $form['products_description'] ?></textarea>


                        <input type='submit' name='submit' value='Edit'>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
<?php
}; ?>