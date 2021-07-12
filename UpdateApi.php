<?php

session_start();



require('App/Libraries/Autoload.php');
spl_autoload_register('autoload');


if (isset($_POST)) {
    $user = new App\Controller\UsersController;
    $user->accounts($_POST);
}
