<?php

    namespace App\Controller;

    use App\Controller\Controller;
    use App\Model\PaniersModel;
    use App\Model\ProductsModel;
    use App\Model\FacturesModel;


    class PaniersController extends Controller
    {

        public function __construct()
        {
            $this->model = new PaniersModel; 
        }

        public function panier()
        {
            
            if(isset($_SESSION['panier']) && !empty($_SESSION['panier']))
            {
                $ids = implode(',',array_keys($_SESSION['panier']));
                $products = new ProductsModel;
                $panier = $products->listBy("WHERE products_id IN ($ids)");
    
                if(isset($_POST['delete']) && count($_SESSION['panier']) > 1)
                {
                    unset($_SESSION['panier'][$_POST['product']]);
                    $ids = implode(',',array_keys($_SESSION['panier']));
                    $panier = $products->listBy("WHERE products_id IN ($ids)");
                }
                elseif(isset($_POST['delete']) && count($_SESSION['panier']) == 1)
                {
                    unset($_SESSION['panier'][$_POST['product']]);
                    header('Location: index.php');
                    
                }
                elseif(isset($_POST['paiement']) && !empty($_POST['paiement']))
                {
                    $user = $_SESSION['id'];
                    $total_price = htmlspecialchars($_POST['prix']);
                    $user = $_SESSION['id'];
                    $ids = implode(',',array_keys($_SESSION['panier']));
                    $panier = $products->listBy("WHERE products_id IN ($ids)");
                    $facture = new FacturesModel;
                    $facture->insertBy('(factures_price,factures_user)', "($total_price,$user) ");
                    $ref = $facture->listBy("WHERE factures_date=( SELECT MAX(factures_date) FROM factures WHERE factures_user=$user)");
                    $ref = $ref[0]['factures_id'];
                   
                    foreach($panier as $commande)
                    {
                        $itemsId = $commande['products_id'];
                        $qt = $_SESSION['panier'][$itemsId];
                        $this->model->insertBy('(paniers_from, paniers_product, paniers_quantity, paniers_ref)',"('$user','$itemsId','$qt','$ref')");

                    }
                    unset($_SESSION['panier']);
                    header('Location: index.php');
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
