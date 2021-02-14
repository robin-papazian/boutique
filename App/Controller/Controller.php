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

    public function inscription()
    {
        if(isset($_POST['submit']))
        {
            $login = $_POST['user'];
            $password = $_POST['user-password'];
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
            $login = $_POST['user'];
            $password = $_POST['user-password'];
            $data = $this->inDb($login);
            if(!$data)
            {
                return 'non';
            }
            else
            {
                return 'oui';
            }
        }    

    }

}


?>