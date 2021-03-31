<h1>Manage Users</h1>

<div style='width:50%;'>
    <form method='post' action='index.php?view=manage_Users'>
        <div class='form_group mb-2'>   
            <label for="users_login">Login</label>
            <input class="form-control" type="text" id='users_login' name='users_login' aria-describedby='categorie_block'>
        </div>
        <div class='form_group mb-2'>   
            <label for="users_familly_name">Nom
                <input class="form-control" type="text" id='users_familly_name' name='users_familly_name' aria-describedby='categorie_block'>
            </label>
            <label for="users_name">Prenom
                <input class="form-control" type="text" id='users_name' name='users_name' aria-describedby='categorie_block'>
            </label>
        </div>
        <div class='form_group mb-2'>   
            <label for="users_email">Email</label>
            <input class="form-control" type="text" id='users_email' name='users_email' aria-describedby='categorie_block'>
        </div>
        <div class='form_group mb-2'>   
            <label for="users_password">Mot de passe</label>
            <input class="form-control" type="password" id='users_password' name='users_password' aria-describedby='categorie_block'>
        </div>
        <div class='form_group mb-2'>   
            <label for="users_town">Ville
                <input class="form-control" type="text" id='users_town' name='users_town' aria-describedby='categorie_block'>
            </label>
            <label for="users_post_code">Code Postale
                <input class="form-control" type="number" id='users_post_code' name='users_post_code' aria-describedby='categorie_block'>
            </label>
        </div>
        <div class='form_group mb-2'>   
            <label for="users_street">Rue
                <input class="form-control" type="text" id='users_street' name='users_street' aria-describedby='categorie_block'>
            </label>
            <label for="users_street_number">Numéro
                <input class="form-control" type="number" id='users_street_number' name='users_street_number' aria-describedby='categorie_block'>
            </label>
        </div>
        <div class='form_group mb-2'>
            <label for="users_droit">Droit</label>
            <select class="form-control mb-3" aria-label=".form-select-lg example" name='users_droit'>
                <option value='1'>Utilisateur</option>
                <option value='42'>Administrateur</option>   
            </select>
        </div>     
        
  
        
        <input type="submit" class="btn btn-primary mb-2" value='Ajouter' name='submit'>
    </form>
</div>

<pre>
<?= $data['execute']['users_login']?>
</pre>