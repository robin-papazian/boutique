<?php

    namespace App\Controller;

    use App\Controller\Controller;

    use App\Model\CategoriesModel;

    require_once('App/Libraries/Autoprepare.php');

    class CategoriesController extends Controller
    {

        public function __construct()
        {
            $this->model = new CategoriesModel;
        }

        public function index()
        {
            $data = $this->model->listby();
            $this->render('index',['data' => $data]);
        }

        public function manageCategorie()
        {
            $allCategories = $this->model->listby();
            $action = '';
            
            if(isset($_POST['add']))
            {
                $newcategorie = $_POST['add_categorie'];
                $this->model->insertBy('(categories_name)', "('$newcategorie')");
                $allCategories = $this->model->listby();
                $action ='go';
                
            }
            elseif( isset($_POST['supprimer']) )
            {   
                $data = autoprepare($_POST);
                // $colone = $data['unknow'];
                // $this->model->deleteBy("WHERE categories_name IN $colone", array_values($data['execute']));
                // $allCategories = $this->model->listby();
            }
            elseif(isset($_POST['edit']))
            {
                $data = autoprepare($_POST);
                //$this->model->updateBy("(categories_name = :categories_name)","_name",'?',);
                
            }

           
            
            $this->render('manage_Categorie',['allCategories' => $allCategories,'action'=>$action,'data'=>$data]);
           
        }
        
    }

?>