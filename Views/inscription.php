<p>inscription</p>
<form method='post' action='index.php?view=inscription'>
<label for='users_name'>prenom
    <input type='text' name='users_name'>
</label>
<label for='users_familly_name'>nom
    <input type='text' name='users_familly_name'>
</label>
<label for='users_login'>Login
    <input type='text' name='users_login'>
</label>
<label for='users_password'>mot de passe 
    <input type='password' name='users_password'>
</label>
<label for='users_email'>email
    <input type='email' name='users_email'>
</label>
<label for='users_town'>ville
    <input type='text' name='users_town'>
</label>
<label for='users_post_code'>code postale
    <input type='number' name='users_post_code'>
</label>
<label for='users_street'>rue
    <input type='text' name='users_street'>
</label>
<label for='users_street_number'>numéro
    <input type='number' name='users_street_number'>
</label>
<input type='submit' name='submit'>
</form>



<?= $form ?>

