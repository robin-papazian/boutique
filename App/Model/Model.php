<?php

namespace App\Model;
use \PDO;

    Class Model
    {
        protected $db;
        protected $table;
        protected $column; 

        public function __construct()
        {
            $this->setDb();
        }

        /**
         * Initialise une connection à la base de donnée
         * @return PDO
         */

        public function setDb() :PDO
        {
            require('Conf/Conf.php');

            $this->db = new PDO($link,$username,$password,array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            return $this->db;
        }

        public function user($login,$password)
        {
            $query = $this->db->prepare("INSERT INTO {$this->table}(`login`, `password`) VALUES (:login,:password)");
            $query->execute([
                ':login' => $login,
                ':password' => $password
            ]);
        }

        public function inDb($login)
        {
            $query = $this->db->query("SELECT * FROM {$this->table} WHERE {$this->column} = '$login'");
            $indb = $query->fetch();
            return $indb;
        }

        public function update($login,$password,$id)
        {

            $query = $this->db->prepare("UPDATE {$this->table} SET login = ?, password = ? WHERE id = ?");
            $query->execute([$login,$password,$id]);
            //UPDATE users SET login = 'bonjour', password = 'bonjour' WHERE login = 'salut'
        }


    }


?>