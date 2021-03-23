<?php

namespace App\Model;

use App\Model\Model;

    
    class ProductsModel extends Model
    {
        public function allByCategorie($id)
        {
            $product = $this->stickOut("SELECT * FROM {$this->table} WHERE products_categorie = '$id'");
            return $product;
        }

        public function description($id)
        {
            $product = $this->stickOut("SELECT * FROM {$this->table} WHERE products_id = '$id'");
            return $product;

        }
    }


?>