<h1>Manage Users</h1>

<div class="m-5">
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

<div class="m-5">
    <form method='post' action='index.php?view=manage_Users'>

        <div class='form_group mb-2'>
            <label for="users_login">Chose a User</label>
            <select class="form-control mb-3" aria-label=".form-select-lg example" name='users_login'>
                <?php
                foreach ($users as $user) {
                    echo "<option value='" . $user['users_login'] . "'>" . $user['users_login'] . '</option>';
                }
                ?>
            </select>
        </div>
        <input type='submit' name='submit' value='Search'>
        <form>
</div>

<div class="m-5 d-flex justify-content-center">
    <table>
        <form method='post' action='index.php?view=manage_Users'>
            <div class='form_group mb-2'>
                <?php if (!empty($userSelected)) : $type = ''; ?>
                    <?php foreach ($userSelected[0] as $colonnes => $value) :
                        if ($colonnes == "users_password") :
                            $type = str_replace('users_', '', $colonnes); ?>
                        <?php elseif ($colonnes == 'users_post_code' || $colonnes == 'users_street_number') : $type = str_replace($colonnes, 'number', $colonnes); ?>
                        <?php else : $type = 'text'; ?>
                        <?php endif; ?>
                        <tr>
                            <th><?= $colonnes ?></th>
                            <td><label for='<?= $colonnes ?>'></label><input type='<?= $type ?>' name='<?= $colonnes ?>' value='<?= $value ?>'></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <th><input type='submit' name='submit' value='Delete' class="btn btn-danger mb-2"></th>
                        <th><input type='submit' name='submit' value='Update' class="btn btn-success mb-2"></th>
                    </tr>
                <?php endif; ?>
            </div>
        </form>
    </table>
</div>