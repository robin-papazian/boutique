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
       
            $user = $this->stickOut('WHERE users_login =', "'$users_login'");
            if(!$user)
            {
                $this->stickIn($array);
                
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
            $user = $this->stickOut('users_login',$login);
            if(!$user)
            {
                return 'Mauvaise identifiant';
            }
            else
            {
                $_SESSION['login'] = $user['users_login'];
                $_SESSION['id'] = $user['users_id'];
                
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
            $this->renew($array,$id);
            
        }    

    }
}

?>