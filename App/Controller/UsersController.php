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
                $array['users_password'] = password_hash($array['users_password'],PASSWORD_BCRYPT);
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
            $user = $this->stickOut('WHERE ',$this->table.'_login = ',"'$login'");
            if(!$user)
            {
                return 'Mauvaise identifiant';
            }
            else
            {
                foreach($user as $index)
                {
                    if(password_verify($password, $index['users_password']))
                    {
                        $_SESSION['login'] = $index['users_login'];
                        $_SESSION['id'] = $index['users_id'];
                        header('Location:index.php?view=account');
                    }
                    else
                    {
                        return 'Mauvais mots de passe';
                    }
                }   
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