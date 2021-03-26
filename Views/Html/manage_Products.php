<h1>Manage products</h1>

<div style='width:50%;'>
    <form method='post' action='index.php?view=manage_Products' enctype="multipart/form-data">
        
        <div class='form_group mb-2'>
            <label for="products_categorie">Chose a categorie</label>
            <select class="form-control mb-3" aria-label=".form-select-lg example" name='products_categorie'>
                <?php
                    $items = $categorie->listBy();
                    foreach($items as $choose)
                    {
                        echo "<option value='".$choose['categories_id']."'>".$choose['categories_name'].'</option>';
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
            <input type="submit" class="btn btn-primary mb-2" name='submit' value='done'>
    </from>
</div>
<?php 

if(isset($_POST['submit']))
{
    //echo Myupload('go');  
    $data = autoprepare($_POST);
    //$products->insertBy($data['colonnes'],$data['prepare'],$data['execute']);
    var_dump($data);
    //var_dump($_POST);
}
?>

<div style='border:solid black; width:50%'>
    <form method='post' action='index.php?view=manage_Products' >
        <?php
            $items = $products->listBy();
            $a=0;
            foreach($items as $form)
            { $a++;?>
            <div class="form-check form-check-inline container-fluid d-flex justify-content-around" style='border:solid red;'>
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name='<?=$a?>' value='<?=$form['products_name']?>'> 
                <img src='Views/Public/Pictures/<?=mystring($form['products_name'])?>.jpg' style='width: 150px'>
                <label class="form-check-label" for="inlineCheckbox1"><?=$form['products_name']?></label>
                <a href=''>Editer</a>
            </div>
            <?php }; ?>

       
        <input type="submit" class="btn btn-primary mb-2" value='Suprimmer' name='suprimer'>
    </from>
</div>
