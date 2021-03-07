<?php

namespace App\Model;

use App\Core\Core;

    class Model extends Core
    {
        public function listBy($cible, $data)
        {
            $result = $this->stickOut("SELECT * FROM {$this->table} WHERE {$this->table}$cible = '$data'");
            return $result;
        }

        public function insertBy($colonne, $prepare, $execute)
        {
            $this->stickIn("INSERT INTO {$this->table} $colonne VALUES $prepare", $execute);
        }

        public function updateBy(string $colonne, string $cible, string $data, array $array)
        {
            $this->stickIn("UPDATE {$this->table} SET $colonne WHERE {$this->table}$cible = '$data'",$array);
        }
       

    }


?>