<?php

namespace App\Controller;

use App\Controller\Controller;

class ProductsController extends Controller
{
    public function acceuil()
    {
        $product = $this->stickOut();
        return $product;
    }

}

?>