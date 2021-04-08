<?php

    namespace App\Controller;

    use App\Controller\Controller;
    use App\Model\FacturesModel;
   


    class FacturesController extends Controller
    {

        public function __construct()
        {
            $this->model = new FacturesModel; 
        }


        public function historique()
        {
            $user = $_SESSION['id'];
            $commander = $this->model->listBy("WHERE factures_user = $user");
            $this->render('historique',['commander'=>$commander]);


        }

    }
?>