<h1>Manage products</h1>

<div style='width:50%;'>
    <form method='post' action='index.php?view=manage_Products' enctype="multipart/form-data">
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name='selected'>
            <option selected>Choose a Categorie</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
        <div class='form_group mb-2'>   
            <label for="add_categorie">Products Name</label>
            <input class="form-control" type="text" id='add_categorie' name='product_name' aria-describedby='categorie_block'>
            <small id="passwordHelpBlock" class="form-text text-muted">
                Le nom du produit apparaittra sur le site .
            </small>
        </div>
        <div class='form_group mb-2'>   
            <label for="add_categorie">Products Price</label>
            <input class="form-control" type="text" id='add_categorie' name='product_price' aria-describedby='categorie_block'>
        </div>
        <div class='form_group mb-2'>
            <label for="fileToUpload">Upload Image</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
            <input type="submit" class="btn btn-primary mb-2" name='add'>
    </from>
</div>

<div style='border:solid black; width:50%'>
    <form method='post' action='index.php?view=manage_Products' >
        <?php
            $a=0;
            foreach($products as $form)
            { $a++;?>
            <div class="form-check form-check-inline container-fluid d-flex justify-content-around" style='border:solid red;'>
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name='<?=$a?>' value='<?=$form['products_name']?>'> 
                <img src='Views/Public/Pictures/<?=$form['ref']?>.jpg' style='width: 150px'>
                <label class="form-check-label" for="inlineCheckbox1"><?=$form['products_name']?></label>
                <a href=''>Editer</a>
            </div>
            <?php }; ?>

       
        <input type="submit" class="btn btn-primary mb-2" value='Suprimmer' name='suprimer'>
    </from>
</div>

<?php 
$dir= "/Views/Public/Pictures";
if(isset($_POST['add']))
{
    $filename = basename($_FILES['fileToUpload']['name']);
    $place = $_FILES['fileToUpload']['tmp_name'];
     echo $place;
   //move_uploaded_file($_FILES['fileToUpload']['name'])
    //var_dump($_FILES);
    move_uploaded_file($place,"$dir/$filename");
    
   
}
?>