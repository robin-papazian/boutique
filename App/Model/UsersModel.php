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
    }
?>