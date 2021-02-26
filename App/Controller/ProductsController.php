<?php

namespace App\Controller;

use App\Controller\Controller;

class ProductsController extends Controller
{
    public function listAll($id)
    {
        $product = $this->stickOut('WHERE ',$this->table.'_categorie = ',$id);
        return $product;
    }

    public function item($id)
    {
        $product = $this->stickOut('WHERE ',$this->table.'_id = ',$id);
        return $product;
    }



}

?>