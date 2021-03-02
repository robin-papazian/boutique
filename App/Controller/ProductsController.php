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

    public function pannier($array)
    {
        $data = autoprepare($array); 
        $product = $this->test("SELECT products_name, products_price FROM products WHERE products_id IN {$data['prepare']}",$data['execute']);
        return $product;
    }

    
}

?>