<?php

namespace App\Model;

use App\Model\Model;


    class UsersModel extends Model
    {

        /**
         * Retourne un utilisateur en bdd
         */
        public function inDb( $login)
        {  
            $user = $this->stickOut("SELECT * FROM {$this->table} WHERE users_login = '$login'");
            return $user;
        }

        /**
         * Insert un utilisateur en bdd
         */
        public function signIn(string $colonne, string $prepare, array $execute)
        {
            $user = $this->stinckIn("INSERT INTO {$this->table} $colonne VALUES $prepare", $execute);
        }


        /**
         * Modifie les données d'un utilisateur
         */
        public function manageAccount(string $colonne, string $id, array $execute)
        {
            $this->stickIn("UPDATE {$this->table} SET $colonne WHERE users_id = $id", $execute);
        }
    }
?>