<?php

namespace App\Model;
use \PDO;

    Class Model
    {
        protected $db;
        protected $table;
        protected $columnsname;
        protected $valuesname; 

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

        public function stickIn($array)
        {
            $tab = [];
            $query = $this->db->prepare("INSERT INTO {$this->table} {$this->columnsname} VALUES {$this->valuesname}");
            foreach($array as $key => $value)
            {
                //$data = is_numeric($value)?intval($value):$value;
                array_push($tab,$value);    
            }
            $query->execute(array_values($tab));
        }

        public function stickOut($column, $data)
        {
            $query = $this->db->query("SELECT * FROM {$this->table} WHERE ($column) = '$data'");
            $indb = $query->fetch();
            return $indb;
        }

        public function renew($array,$id)
        {
            //$id = (int)$id;
            $columns = [];
            $result = [];
            $cible = $this->table.'_id = ?';
            foreach($array as $key => $value)
            {
                if(!empty($value))
                {
                    $key .= ' = ?,';     
                    array_push($columns, $key);
                    array_push($result, $value);    
                }
                
            }
            $columns = implode('',$columns);
            $lastChar = strlen($columns) -1 ;
            $columns = substr_replace($columns,'', $lastChar);
            
            array_push($result, $id);
            
            
            $query = $this->db->prepare("UPDATE {$this->table} SET $columns WHERE $cible");

            $query->execute(array_values($result));
        }

    }


?>