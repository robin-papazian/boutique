<?php

    namespace App\Controller;

    use App\Controller\Controller;

    use App\Model\CategoriesModel;

    class CategoriesController extends Controller
    {

        public function __construct()
        {
            $this->model = new CategoriesModel;
           
        }

        public function index()
        {
            $data = $this->model->listAll();
            $this->render('index',['data' => $data]);
        }
        
    }

?>