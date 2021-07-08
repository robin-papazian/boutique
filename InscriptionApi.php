<?php

session_start();



require('App/Libraries/Autoload.php');
//require('App/Libraries/Autoprepare.php');
spl_autoload_register('autoload');




if (isset($_POST)) {
    $user = new App\Controller\UsersController;
    $user->inscriptions($_POST);
}
