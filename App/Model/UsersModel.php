<?php

namespace App\Model;

use App\Model\Model;


class UsersModel extends Model
{

    /**
     * Retourne un utilisateur en bdd
     */
    public function inDb($login)
    {
        $user = $this->listBy("WHERE users_login = '$login'");
        return $user;
    }

    /**
     * Modifie les données d'un utilisateur
     */
    public function manageAccount(string $colonne, string $id, array $execute)
    {
        $this->updateBy($colonne, '_id', $id, $execute);
    }
}
