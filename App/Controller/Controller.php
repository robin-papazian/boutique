<?php

namespace App\Controller;

use App\Model\Model;

class Controller extends Model
{
    protected $table = 'users';
    protected $column = 'login';

    public function render(string $page,$variable = [])
    {
        ob_start();
        extract($variable);
        require('Views/'.$page.'.php');
        $PageContent = ob_get_clean();
        require('Views/layout.php');

    }

    public function form()
    {
        if(isset($_POST['submit']))
        {
            return $_POST;  
        }
        else
        {
            return NULL;
        }
        
    }

    public function inscription($array)
    {
        if(isset($array))
        {
            extract($array);
            $data = $this->inDb($login);
            if(!$data)
            {
                $this->user($login,$password);
            }
            else
            {
                $data = 'le login existe déja';
                return $data;
            }      
        }
        
    }

    public function connexion()
    {
        if(isset($_POST['submit']))
        {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $data = $this->inDb($login);
            if(!$data)
            {
                return 'non';
            }
            else
            {
                
                $_SESSION['login'] = $data['login'];
                $_SESSION['id'] = $data['id'];
                
                header('Location:index.php?view=account');
            
            }
        }    

    }

    public function account()
    {
        if(isset($_POST['submit']))
        {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $id = $_SESSION['id'];
            $data = $this->update($login,$password,$id);
        }    

    }

}


?>