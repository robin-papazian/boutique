<?php

namespace App\Model;

use App\Model\Model;

    
    class ProductsModel extends Model
    {
        public function allByCatgorie()
        {
            $product = $this->stickOut("SELECT * FROM {$this->table} WHERE products_categorie = '$id'");
            return $product;
        }
    }


?>