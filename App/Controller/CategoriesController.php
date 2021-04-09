<?php

namespace App\Controller;

use App\Controller\Controller;

use App\Model\CategoriesModel;

use App\Model\ProductsModel;

require_once('App/Libraries/Autoprepare.php');

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->model = new CategoriesModel;
    }

    public function index()
    {
        $last_products = new ProductsModel;
        $result = $last_products->listBy('ORDER BY products_id  DESC limit 3');
        $data = $this->model->listby();
        $this->render('index', ['data' => $data, 'result' => $result]);
    }

    public function manageCategorie()
    {
        $allCategories = $this->model->listby();
        $action = '';

        if (isset($_POST['submit']) && $_POST['submit'] == 'Add') {
            $newcategorie = $_POST['add_categorie'];
            $this->model->insertBy('(categories_name)', "('$newcategorie')");
            $allCategories = $this->model->listby();
            $action = 'go';
        } elseif (isset($_POST['submit']) && $_POST['submit'] == 'Delete') {
            $data = autoprepare($_POST);
            $colone = $data['unknow'];
            $this->model->deleteBy("WHERE categories_name IN $colone", array_values($data['execute']));
            $allCategories = $this->model->listby();
        } elseif (isset($_POST['submit']) && $_POST['submit'] == 'edit') {
            $data = autoprepare($_POST);
            $value = array_values($data['execute']);
            $update = array_keys($data['execute']);
            $this->model->updateBy("categories_name = '$value[0]'", "_name", $update[0]);
            $allCategories = $this->model->listby();
        }



        $this->render('manage_Categorie', ['allCategories' => $allCategories, 'action' => $action]);
    }
}
