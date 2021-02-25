<?php

namespace App\Controller;

use App\Controller\Controller;

class UsersController extends Controller
{

    public function manage($view, $array)
    {
        if(isset($array))
        {
            extract($array);
            $user = $this->stickOut('WHERE ',$this->table.'_login = ', "'$users_login'");
            if(!$user)
            {
                if($view == 'inscription')
                {
                    $array['users_password'] = password_hash($array['users_password'],PASSWORD_BCRYPT);
                    $this->stickIn($array);
                }
                elseif($view == 'connexion')
                {
                    return 'Mauvaise identifiant';
                }
            }
            elseif($user)
            {
                if($view == 'inscription')
                {
                    return 'le login existe déja';
                }
                elseif($view == 'connexion')
                {
                    $m = $this->acces($user,$users_password);
                    return $m;
                }
                elseif($view == 'account')
                {
                    $id = $_SESSION['id'];
                    $this->renew($array,$id);

                }
            }    
        }
    }

    public function acces($array, $data)
    {
        foreach($array as $index)
        {
            if(password_verify($data, $index['users_password']))
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

?>