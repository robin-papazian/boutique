<div class="bg-image-2">
    <div class="d-flex justify-content-center">
        <form method="POST" action="index.php?view=connexion">
            <div class="card bg-dark text-light" style=" width: 18rem;">
                <img class="rounded" src="Views/Public/Pictures/comein.png" alt="we want you">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <h5 class="card-title">Se connecter</h5>
                    </div>
                    <div class="col"> <label for='users_login' class="form-control-label text-muted"></label> <input type="text" name="users_login" placeholder="Login" class="form-control" required> </div>
                    <div class="col"> <label for='users_password' class="form-control-label text-muted"></label> <input type="password" name="users_password" placeholder="Mot de passe" class="form-control" required> </div>

                    <div class="d-flex justify-content-center"><input value=" Se connecter" type='submit' name='submit' class="d-flex justify-content-center btn btn-primary m-3"></div>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $message ?>