<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Model\ProductsModel;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->model = new productsModel;
       
    }

    public function product()
    {
        $product = new ProductsModel;
        $this->render('products',['product' => $product]);
    }

    public function item()
    {
        $product = new ProductsModel;
        $this->render('item',['product' => $product]);
    }

    public function manageProduct()
    {
        $products = $this->model->listBy(); 
        $this->render('manage_Products',['products' => $products]);

    }


    // public function pannier($array)
    // {
    //     $data = autoprepare($array); 
    //     $product = $this->test("SELECT products_name, products_price FROM products WHERE products_id IN {$data['prepare']}",$data['execute']);
    //     return $product;
    // }

    
}

?>