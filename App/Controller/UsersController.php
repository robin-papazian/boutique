<?php

namespace App\Controller;

use App\Controller\Controller;

class UsersController extends Controller
{
    public function inscription($array)
    {

        if(isset($array))
        {
            extract($array);
       
            $user = $this->inDb($users_login);
            if(!$user)
            {
                $this->insertData($array);
                
            }
            else
            {
                return 'le login existe déja';    
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