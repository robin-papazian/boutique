<h1 class="d-flex justify-content-center">Tout pour la Maison</h1>
<h2 class="d-flex justify-content-center">Connexion</h2>
<div class="d-flex rounded m-5 bg-dark justify-content-center">
    <form class="m-5" method='post' action='index.php?view=connexion'>
        <div class="form-group">
            <label class="text-light" for="users_login">Login</label>
            <input type="text" class="form-control " name="users_login" aria-describedby="login" placeholder="Entrer Login">
        </div>
        <div class="form-group">
            <label class="text-light" for="exampleInputPassword1">Mot de Passe</label>
            <input type="password" name="users_password" class="form-control " id="exampleInputPassword1" placeholder="Password">
        </div>
        <input type="submit" name="submit" class="btn btn-primary m-3" value="Se Connecter">
    </form>
</div>
<?= $message ?>