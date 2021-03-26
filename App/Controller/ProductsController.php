<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Model\ProductsModel;
use App\Model\CategoriesModel;

require_once('App/Libraries/Autoprepare.php');

class ProductsController extends Controller
{
    protected $secondModel;

    public function __construct()
    {
        $this->model = new ProductsModel; 
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
        $products = $this->model;
        $categorie = new CategoriesModel;
        $this->render('manage_Products',['products' => $products,'categorie'=>$categorie]);

    }




    // public function pannier($array)
    // {
    //     $data = autoprepare($array); 
    //     $product = $this->test("SELECT products_name, products_price FROM products WHERE products_id IN {$data['prepare']}",$data['execute']);
    //     return $product;
    // }

    
}

?>