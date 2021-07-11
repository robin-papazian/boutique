<?php

namespace App\Controller;

use App\Controller\Controller;

use App\Model\UsersModel;

require_once('App/Libraries/Autoprepare.php');


class UsersController extends Controller
{

    public function __construct()
    {
        $this->model = new UsersModel;
    }

    public function inscription(array $array)
    {
        $data = autoprepare($array);
        extract($data['execute']);
        $user = $this->model->inDb($users_login);

        if (!$user) {
            $data['execute']['users_password'] = password_hash($data['execute']['users_password'], PASSWORD_BCRYPT);
            $this->model->insertBy($data['colonnes'], $data['prepare'], $data['execute']);
            echo '1';
        } else {
            echo '2';
        }
    }

    public function connexion(array $array)
    {
        $data = autoprepare($array);
        extract($data['execute']);
        $user = $this->model->inDb($users_login);
        if ($user) {
            if (password_verify($data['execute']['users_password'], $user[0]['users_password'])) {
                $_SESSION['id'] = $user[0]['users_id'];
                $_SESSION['login'] = $user[0]['users_login'];
                $_SESSION['droit'] = $user[0]['users_droit'];
                $_SESSION['prenom'] = $user[0]['users_name'];
                $_SESSION['nom'] = $user[0]['users_familly_name'];
                $_SESSION['email'] = $user[0]['users_email'];
            } else {
                echo '1';
            }
        } else {
            echo '1';
        }
    }

    public function accounts()
    {
        $id = $_SESSION['id'];

        $data = autoprepare($_POST);
        if (in_array($_POST['users_password'], $data['execute'])) {
            $data['execute']['users_password'] = password_hash($data['execute']['users_password'], PASSWORD_BCRYPT);
        }

        $this->model->manageAccount($data['set'], $id, $data['execute']);
    }

    public function account()
    {
        $id = $_SESSION['id'];
        if (isset($_POST['submit'])) {
            $data = autoprepare($_POST);
            if (in_array($_POST['users_password'], $data['execute'])) {
                $data['execute']['users_password'] = password_hash($data['execute']['users_password'], PASSWORD_BCRYPT);
            }

            $this->model->manageAccount($data['set'], $id, $data['execute']);
        }
        $this->render('account');
    }

    public function manageUser()
    {
        $userSelected = '';
        $id_user = '';
        $users = $this->model->listBy();
        if (isset($_POST['submit']) && $_POST['submit'] == 'Ajouter') {
            $data = autoprepare($_POST);
            extract($data['execute']);
            $user = $this->model->inDb($users_login);

            if (!$user) {
                $data['execute']['users_password'] = password_hash($data['execute']['users_password'], PASSWORD_BCRYPT);

                $this->model->insertBy($data['colonnes'], $data['prepare'], $data['execute']);
                $users = $this->model->listBy();
            }
        } elseif (isset($_POST['submit']) && $_POST['submit'] == 'Search') {
            $data = autoprepare($_POST);
            $login = $data['execute']['users_login'];
            $userSelected = $this->model->inDb($login);
            $_SESSION['update_user'] = $userSelected[0]['users_id'];
        } elseif (isset($_POST['submit']) && $_POST['submit'] == 'Update') {
            $data = autoprepare($_POST);
            if (in_array($_POST['users_password'], $data['execute'])) {
                $data['execute']['users_password'] = password_hash($data['execute']['users_password'], PASSWORD_BCRYPT);
            }
            $this->model->manageAccount($data['set'], $_SESSION['update_user'], $data['execute']);
            $users = $this->model->listBy();
        } elseif (isset($_POST['submit']) && $_POST['submit'] == 'Delete') {
            $id = $_SESSION['update_user'];
            $this->model->deleteBy("WHERE users_id = $id ");
            $users = $this->model->listBy();
        }

        $this->render('manage_Users', ['users' => $users, 'userSelected' => $userSelected]);
    }
}
