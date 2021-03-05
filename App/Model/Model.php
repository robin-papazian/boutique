<?php

namespace App\Model;
use \PDO;

    Class Model
    {
        protected $db;
        
        protected $table;
        public function getTable(){return $this->table;}


        protected $columnsname;
        protected $valuesname; 

        public function __construct()
        {
            $this->setDb();
            $this->table = $this->SetTable();    
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

        /**
         * Retourne le nom d'une table en bdd en se basant
         * sur le nom de la class utilisé 
         * @return string */
        
        public function SetTable() :string
        {
            $classnamespace = get_class($this);
            $classnamespace = explode('\\',$classnamespace);
            $class = end($classnamespace);
            $class = strtolower($class);
            $table = str_replace('model','',$class);
            return $table;
    
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

        public function stickOut(...$param)
        {
            $param = implode('',$param);
            
            
            $query = $this->db->query("SELECT * FROM {$this->table} $param");
           
            $indb = $query->fetchAll();
            return $indb;
        }

        public function test($sql, $array=[])
        {
            $query = $this->db->prepare($sql);
            $query->execute($array);
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function testA($sql, $array=[])
        {
            $query = $this->db->prepare($sql);
            $query->execute($array);
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