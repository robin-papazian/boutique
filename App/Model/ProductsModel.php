<?php

namespace App\Model;

use App\Model\Model;


class ProductsModel extends Model
{
    public function byCategorie($id)
    {
        $product = $this->listBy("WHERE products_categorie = '$id'");
        return $product;
    }
    public function byName($name)
    {
        $product = $this->listBy("WHERE products_name = '$name'");
        return $product;
    }
    public function byId($id)
    {
        $product = $this->listBy("WHERE products_id = '$id'");
        return $product;
    }
}
