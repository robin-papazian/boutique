<?php

namespace App\Core;

use \PDO;

    class Core
    {
        protected $db;
        
        protected $table;
        public function getTable(){return $this->table;}

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


        /**
         * Execute une requet prepare
         */
        public function stickIn($sql, $array=[])
        {
            var_dump($sql);
            $query = $this->db->prepare($sql);
            $query->execute($array);
        }

        /**
         * Retourne le resulta d'une requete prepare
         * 
         */
        public function stickOut( $sql, array $array=[])
        {
            var_dump($sql);
            $query = $this->db->prepare($sql);
            $query->execute($array);
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

    }
?>