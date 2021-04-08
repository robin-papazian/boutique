<div class="bg-image">
    <div class="d-flex justify-content-center">
        <form method="POST" action="index.php?view=inscription">
            <div class="card bg-dark text-light" style=" width: 18rem;">
                <img class="rounded" src="Views/Public/Pictures/sign_up.jpg" alt="we want you">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <h5 class="card-title">S'inscrire</h5>
                    </div>
                    <div class="row">
                        <div class="col"> <label for='users_name' class="form-control-label text-muted"></label> <input type="text" name="users_name" placeholder="Prénom" class="form-control"> </div>
                        <div class="col"> <label for='users_familly_name' class="form-control-label text-muted"></label> <input type="text" name="users_familly_name" placeholder="Nom" class="form-control"> </div>
                    </div>
                    <div class="row">
                        <div class="col"> <label for='users_login' class="form-control-label text-muted"></label> <input type="text" name="users_login" placeholder="Login" class="form-control"> </div>
                        <div class="col"> <label for='users_password' class="form-control-label text-muted"></label> <input type="password" name="users_password" placeholder="Mot de passe" class="form-control"> </div>
                    </div>
                    <div class="form-group"> <label for='users_email' class="form-control-label text-muted"></label> <input type="mail" name="users_email" placeholder="Email" class="form-control"> </div>
                    <div class="form-group"> <label for='users_street' class="form-control-label text-muted"></label> <input type="text" name="users_street" placeholder="Rue" class="form-control"> </div>
                    <div class="row">
                        <div class="col"> <label for='users_post_code' class="form-control-label text-muted"></label> <input type="number" name="users_post_code" placeholder="Code Postale" class="form-control"> </div>
                        <div class="col"> <label for='users_town' class="form-control-label text-muted"></label> <input type="text" name="users_town" placeholder="Ville" class="form-control"> </div>
                    </div>
                    <div class="d-flex justify-content-center"><input value=" S'inscrire" type='submit' name='submit' class="d-flex justify-content-center btn btn-primary m-3"></div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
echo '<pre>';
var_dump($data);
echo '</pre>';

?>