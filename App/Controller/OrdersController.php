<?php

    namespace App\Controller;

    use App\Controller\Controller;
    use App\Model\OrdersModel;
    use App\Model\ProductsModel;


    class OrdersController extends Controller
    {

        public function __construct()
        {
            $this->model = new OrdersModel; 
        }

        public function panier()
        {
            if(isset($_SESSION['panier']) && !empty($_SESSION['panier']))
            {
                $ids = implode(',',array_keys($_SESSION['panier']));
                $products = new ProductsModel;
                $panier = $products->listBy("WHERE products_id IN ($ids)");
    
                if(isset($_POST['delete']))
                {
                    unset($_SESSION['panier'][$_POST['product']]);
                    $ids = implode(',',array_keys($_SESSION['panier']));
                    $panier = $products->listBy("WHERE products_id IN ($ids)");
                }
                elseif(isset($_POST['prix']) && !empty($_POST['prix']))
                {
                    $user = $_SESSION['id'];
                    $ids = implode(',',array_keys($_SESSION['panier']));
                    $panier = $products->listBy("WHERE products_id IN ($ids)");
                    foreach($panier as $commande)
                    {
                        $itemsId = $commande['products_id'];
                        $qt = $_SESSION['panier'][$itemsId];
                        $this->model->insertBy('(orders_from, orders_product, orders_quantity)',"('$user','$itemsId','$qt')");

                    }
                }
                
                $this->render('panier',['panier' => $panier]);
            }
            else
            {
                $this->render('404');
            }    
        }
        
        public function itemSelected()
        {
            $i = 0;
            if(isset($_SESSION['panier']))
            {
                foreach($_SESSION['panier'] as $item)
                {
                    $i++;

                }
            }
            return $i;
        }




    }
