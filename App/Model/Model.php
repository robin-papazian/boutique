<?php

namespace App\Model;
use \PDO;

    Class Model
    {
        protected $db;
        protected $table;
        protected $columnsname = "(";
        protected $valuesname = "("; 

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

        public function insertData($array)
        {
            $tab = [];
            $query = $this->db->prepare("INSERT INTO {$this->table} {$this->columnsname} VALUES {$this->valuesname}");
            foreach($array as $key => $value)
            {
                $data = is_numeric($value)?intval($value):$value;
                array_push($tab,$data);    
            }
            $query->execute(array_values($tab));
        }

        public function findMe($column, $data)
        {
            $query = $this->db->query("SELECT * FROM {$this->table} WHERE ($column) = '$data'");
            $indb = $query->fetch();
            return $indb;
        }

        public function update($login,$password,$id)
        {
            $query = $this->db->prepare("UPDATE {$this->table} SET users_login = ?, users_password = ? WHERE users_id = ?");
            $query->execute([$login,$password,$id]);
        }


    }


?>