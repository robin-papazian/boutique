<?php

namespace App\Controller;

use App\Model\Model;

class Controller extends Model
{
    protected $table = 'users';
    protected $column = 'users_login';
    protected $view;

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
                $this->user($login,$password,$name,$familly_name,$town,$post_code,$street,$street_number,$email);
            }
            else
            {
                $data = 'le login existe déja';
                return $data;
             
            }
        }
        
    }

    public function connexion($array)
    {
        if(isset($array))
        {
            extract($array);
            $data = $this->inDb($login);
            if(!$data)
            {
                return 'Mauvaise identifiant';
            }
            else
            {
                $_SESSION['login'] = $data['users_login'];
                $_SESSION['id'] = $data['users_id'];
                
                header('Location:index.php?view=account');
            }      
        }
    }

    public function account($array)
    {
        if(isset($array))
        {
            extract($array);
            $id = $_SESSION['id'];
            $this->update($login,$password,$id);
            
        }    

    }

    
    


}


?>