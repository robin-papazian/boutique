<!-- 
    _Sur tout nos formulaire Nous metton l'attribue name en submit pour tout les bouton d'envoi
    _Tout nos imput on comme name le méme nom que la colonne en BDD
    _Ensuite notre algorithme Autoprepare se charge de nous prépare la réquete SQL de notre choix
 -->

<h1>Manage categorie</h1>

<div style='width:50%;'>
    <form method='post' action='index.php?view=manage_Categorie' enctype="multipart/form-data">
        <div class='form_group mb-2'>   
            <label for="add_categorie">Categorie Name</label>
            <input class="form-control" type="text" id='add_categorie' name='add_categorie' aria-describedby='categorie_block'>
            <small id="passwordHelpBlock" class="form-text text-muted">
                Le nom de la categorie apparaittra sur le site .
            </small>
        </div>
        <div class='form_group mb-2'>
            <label for="file">Upload Image</label>
            <input type="file" name="file" id="file">
        </div>
        <?= Myupload($action)?>
        <input type="submit" class="btn btn-primary mb-2" value='Add' name='submit'>
    </form>
</div>
<div style='border:solid black; width:50%'>
    <form method='post' action='index.php?view=manage_Categorie' >
        <?php
            $a=0;
            foreach($allCategories as $form)
            { $a++;?>
            <div class="form-check form-check-inline container-fluid d-flex justify-content-around" style='border:solid red;'>
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name='<?=$a?>' value='<?=$form['categories_name']?>'> 
                <img src='Views/Public/Pictures/<?= mydir("Views/Public/Pictures",$form['categories_name']) ?>' style='width: 150px'>
                <label class="form-check-label" for="inlineCheckbox1"><?=$form['categories_name']?></label>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_categorie<?=$form['categories_name']?>">
                    Editer
                </button>
                
            </div>
        <?php }; ?>

       
        <input type="submit" class="btn btn-primary mb-2" name='submit' value='Delete'>
    </form>
</div>


<?php

foreach($allCategories as $form)
{?>
    <div class="modal fade" id="edit_categorie<?=$form['categories_name']?>" tabindex="-1" aria-labelledby="edit_categorieLabel<?=$form['categories_name']?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_categorieLabel<?=$form['categories_name']?>"><?=$form['categories_name']?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method='post' action='index.php?view=manage_Categorie'>
                        <input type="text" class="form-control" name="<?=$form['categories_name']?>"  placeholder='edit' >
                        <label for="<?=$form['categories_name']?>"></label>
                        <input type='submit' name='submit' value='edit'>     
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


