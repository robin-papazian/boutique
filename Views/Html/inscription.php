<h5 class="d-flex justify-content-center">Inscription</h5>
<div class="d-flex rounded m-5 bg-dark justify-content-center">
    <form class="text-light" method='post' action='index.php?view=connexion'>
        <div class="row m-2">
            <div class="mb-3 ml-3">
                <label for='users_name'>Prénom
                    <input type='text' name='users_name'>
                </label>
            </div>
            <div class="mb-3 ml-3">
                <label for='users_familly_name'>Nom
                    <input type='text' name='users_familly_name'>
                </label>
            </div>
        </div>
        <div class="row m-2">
            <div class="mb-3 ml-3">
                <label for='users_login'>Login
                    <input type='text' name='users_login'>
                </label>
            </div>
            <div class="mb-3 ml-3">
                <label for='users_password'>Mot de passe
                    <input type='password' name='users_password'>
                </label>
            </div>
            <div class="mb-3 ml-3">
                <label for='users_email'>Email
                    <input type='email' name='users_email'>
                </label>
            </div>
        </div>
        <div class="row m-2">
            <div class="mb-3 ml-3">
                <label for='users_street_number'>Numéro
                    <input type='number' name='users_street_number'>
                </label>
            </div>
            <div class="mb-3 ml-3">
                <label for='users_street'>Rue
                    <input type='text' name='users_street'>
                </label>
            </div>
        </div>
        <div class="row m-2">
            <div class="mb-3 ml-3">
                <label for='users_post_code'>Code postale
                    <input type='number' name='users_post_code'>
                </label>
            </div>
            <div class="mb-3 ml-3">
                <label for='users_town'>Ville
                    <input type='text' name='users_town'>
                </label>
            </div>
        </div>
        <input type='submit' name='submit' class="btn btn-primary m-3">
    </form>
</div>





<?php
echo '<pre>';
var_dump($data);
echo '</pre>';

?>