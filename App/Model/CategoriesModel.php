<?php

namespace App\Model;

use App\Model\Model;

    class CategoriesModel
    {
        public function listAll()
        {
            $categories = $this->stickOut("SELECT * FROM {$this->table} WHERE ");
        }
    }


?>