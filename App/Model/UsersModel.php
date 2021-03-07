<?php

namespace App\Model;

use App\Model\Model;


    class UsersModel extends Model
    {

        /**
         * Retourne un utilisateur en bdd
         */
        public function inDb($login)
        {
            $user = $this->listBy("_login", $login);
            return $user;
        }

        

        /**
         * Insert un utilisateur en bdd
         */
        public function signIn(string $colonne, string $prepare, array $execute)
        {
            $user = $this->insertBy($colonne, $prepare, $execute);
        }


        /**
         * Modifie les données d'un utilisateur
         */
        public function manageAccount(string $colonne, string $id, array $execute)
        {
            $this->updateBy($colonne,'_id',$id,$execute);
        }
    }
?>