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
        $data = '';
        if(isset($_POST['submit']))
        {
            $data = autoprepare($_POST);
            extract($data['execute']); 
            $user = $this->model->inDb($users_login);

            if(!$user)
            {
                $data['execute']['users_password'] = password_hash($data['execute']['users_password'],PASSWORD_BCRYPT);

                $this->model->insertBy($data['colonnes'], $data['prepare'], $data['execute']);
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
                    $_SESSION['id'] = $user[0]['users_id'];
                    $_SESSION['login'] = $user[0]['users_login'];
                    // $_SESSION['prenom'] = $user[0]['users_name'];
                    // $_SESSION['nom'] = $user[0]['users_familly_name'];
                    // $_SESSION['email'] = $user[0]['users_email'];
                    
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

    public function testation()
    {
        $class = get_class($this);
        $class = str_replace('Controller','Model',$class);
        $model = explode('\\',$class);
        $model = end($model);
       
        $model = $model.";";
        $this->render('index',['class' => $class,'model'=>$model]);
    }
    
   
}

?>