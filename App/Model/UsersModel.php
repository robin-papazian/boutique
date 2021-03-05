<?php

namespace App\Model;

use App\Model\Model;


    class UsersModel extends Model
    {

        public function inDb($login)
        {  
            $user = $this->test("SELECT * FROM {$this->table} WHERE users_login = '$login'");
            return $user;
        }

        public function signIn($colonne,$prepare, $execute)
        {
            $user = $this->testA("INSERT INTO {$this->table} $colonne VALUES $prepare", $execute);
        }

        public function manageAccount($colonne, $id, $execute)
        {
            $this->testA("UPDATE {$this->table} SET $colonne WHERE users_id = $id", $execute);
        }


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