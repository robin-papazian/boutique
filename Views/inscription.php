<p>inscription</p>
<form method='post' action='index.php?view=inscription'>
<label for='name'>prenom
    <input type='text' name='name'>
<label>
<label for='familly_name'>nom
    <input type='text' name='familly_name'>
<label>
<label for='login'>Login
    <input type='text' name='login'>
<label>
<label for='password'>mot de passe 
    <input type='password' name='password'>
<label>
<label for='email'>email
    <input type='email' name='email'>
<label>
<label for='town'>ville
    <input type='text' name='town'>
<label>
<label for='post_code'>code postale
    <input type='number' name='post_code'>
<label>
<label for='street'>rue
    <input type='text' name='street'>
<label>
<label for='street_number'>numéro
    <input type='number' name='street_number'>
<label>
<input type='submit' name='submit'>
</form>



<?= $form ?>

