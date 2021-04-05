<h1>Connexion</h1>
<form method='post' action='index.php?view=connexion'>
    <label for='users_login'>Login
        <input type='text' name='users_login'>
        <label>
            <label for='users_password'>Mot de passe
                <input type='password' name='users_password'>
                <label>
                    <input class="" type='submit' name='submit' value="Se connecter">
</form>

<?= $message ?>