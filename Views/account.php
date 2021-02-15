<h1>compte</h1>
<form method='post' action='index.php?view=account'>
<label for='user'>Login
    <input type='text' name='login' value=<?=$_SESSION['login']?>>
<label>
<label for='user-password'>mot de passe 
    <input type='password' name='password'>
<label>
<input type='submit' name='submit'>
</form>
<?php $data ;?>