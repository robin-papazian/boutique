<?php

namespace App\Model;

use App\Model\Model;

    class CategoriesModel extends Model
    {
        public function listAll()
        {
            $categories = $this->stickOut("SELECT * FROM {$this->table}");
            return $categories;
        }
    }


?>