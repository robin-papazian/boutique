<?php

namespace App\Model;

use App\Model\Model;

    
    class ProductsModel extends Model
    {
        public function byCategorie($id)
        {
            $product = $this->listBy("products_categorie = '$id'");
            return $product;
        }

        public function byId($id)
        {
            $product = $this->listBy("products_id = '$id'");
            return $product;

        }
    }


?>