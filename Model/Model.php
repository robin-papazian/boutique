<?php

namespace Model;
use \PDO;

    Class Model
    {
        protected $db;
        protected $table; 

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
            require('Conf.php');

            $this->db = new PDO($link,$username,$password,array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            return $this->db;
        }

        public function add($login,$password)
        {
            $query = $this->db->prepare("INSERT INTO {$this->table}(`login`, `password`) VALUES (:login,:password)");
            $query->execute([
                ':login' => $login,
                ':password' => $password
            ]);
        }

        public function checkTwin($login)
        {
            $query = $this->db->query("SELECT login FROM {$this->table} WHERE login = '$login'");
            $indb = $query->fetch();
            return $indb;
        

        }


    }


?>