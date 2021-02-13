<?php

namespace Controller;

use Model\Model;

class Controller extends Model
{
    protected $table = 'users';

    public function render(string $page,$variable = [])
    {
        ob_start();
        extract($variable);
        require('Views/'.$page.'.php');
        $PageContent = ob_get_clean();
        require('Views/layout.php');

    }

    public function inscriptio()
    {
        
        if(isset($_POST['submit']))
        {
            $login = $_POST['user'];
            $password = $_POST['user-password'];
            $data = $this->checkTwin($login);
            if(!$data)
            {
                $this->add($login,$password);
            }
            else
            {
                $data = 'le login existe déja';
                return $data;
            }
            
            
            
        }
        
         
        
        
        
    }

}


?>