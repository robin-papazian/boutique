<?php 

$a=0;

?>
<h1>Manage categorie</h1>

<div style='width:50%;'>
    <form method='post' action='index.php?view=manage_Categorie'>
        <div class='form_group mb-2'>   
            <label for="add_categorie">Categorie Name</label>
            <input class="form-control" type="text" id='add_categorie' name='add_categorie' aria-describedby='categorie_block'>
            <small id="passwordHelpBlock" class="form-text text-muted">
                Le nom de la categorie apparaittra sur le site .
            </small>
        </div>
        <input type="submit" class="btn btn-primary mb-2" value='Add Categorie' name='add'>
    </from>
</div>
<div style='border:solid black; width:50%'>
    <form method='post' action='index.php?view=manage_Categorie' >
        <?php

            foreach($allCategories as $form)
            { $a++;?>
            <div class="form-check form-check-inline container-fluid d-flex justify-content-around" style='border:solid red;'>
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name='<?=$a?>' value='<?=$form['categories_name']?>'> 
                <img src='Views/Public/Pictures/Categories/<?=$form['categories_name']?>.jpg' style='width: 150px'>
                <label class="form-check-label" for="inlineCheckbox1"><?=$form['categories_name']?></label>
            </div>
            <?php }; ?>

       
        <input type="submit" class="btn btn-primary mb-2" value='Suprimmer' name='suprimer'>
    </from>
</div>


<?php

   var_dump($data)
     

?>
