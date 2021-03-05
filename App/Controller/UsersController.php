<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Model\UsersModel;

require_once('App/Libraries/Autoprepare.php');

class UsersController extends Controller
{
    public function __construct()
    {
        $this->model = new UsersModel;
    }

    public function inscription()
    {
       
        if(isset($_POST['submit']))
        {
            $data = autoprepare($_POST);
            extract($data['execute']); 
            $user = $this->model->inDb($users_login);

            if(!$user)
            {
                $data['execute']['users_password'] = password_hash($data['execute']['users_password'],PASSWORD_BCRYPT);

                $this->model->signIn($data['colonnes'], $data['prepare'], $data['execute']);
            }
        }
        
        
        $this->render('inscription',['data' => $data]);

    }

    public function connexion()
    {
        $message = '';
        if(isset($_POST['submit']))
        {
            $data = autoprepare($_POST);
            extract($data['execute']); 
            $user = $this->model->inDb($users_login);
            if($user)
            {
                if(password_verify($data['execute']['users_password'],$user[0]['users_password']))
                {
                    $_SESSION['login'] = $user[0]['users_login'];
                    $_SESSION['id'] = $user[0]['users_id'];
                    header('Location:index.php?view=account');
                }
                else
                {
                    $message = 'Mauvaise Identifiant';

                }
            }
            else
            {
                $message = 'Utilisateur Inconnue';
            }
        }
        $this->render('connexion',['message' => $message]);

    }

    public function account()
    {
        $id = $_SESSION['id'];
        if(isset($_POST['submit']))
        {
            $data = autoprepare($_POST);
            $this->model->manageAccount($data['set'],$id,$data['execute']);
        }
        $this->render('account');


    }
   
}

?>