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
        <button type="submit" class="btn btn-primary mb-2">Add Categorie</button>
    </from>
</div>

<?php

var_dump($_POST['add_categorie'])


?>