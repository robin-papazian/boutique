<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Model\ProductsModel;
use App\Model\CategoriesModel;


require_once('App/Libraries/Autoprepare.php');

class ProductsController extends Controller
{
    

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

    public function orders()
    {
        $orders = new ProductsModel;
        $this->render('orders',['orders' => $orders]);
    }


    public function manageProduct()
    {
        $products = $this->model;
        $categorie = new CategoriesModel;
        $this->render('manage_Products',['products' => $products,'categorie'=>$categorie]);

    }

    public function autocompletion()
    {
        $arrays = $this->model->listBy();
        $list = "";
        
        foreach($arrays as $product )
        {
            $nameItem = $product['products_name'];
            $idItem = $product['products_id'];
            $list .= "<option value='$nameItem'>$nameItem</option>" ;
            
        }
        return $list;
    }



}

?>