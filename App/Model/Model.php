<?php

namespace App\Model;
use \PDO;

    Class Model
    {
        protected $db;
        protected $table;
        protected $column;
        protected $columnsname = "("; 

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

        public function user($users_name,$users_familly_name,$users_login,$users_password,$users_email,$users_town,$users_post_code,$users_street,$users_street_number)
        {
            $int_post_code = intval($users_post_code);
            $int_street_number = intval($users_street_number);
            $query = $this->db->prepare("INSERT INTO {$this->table} {$this->columnsname} VALUES (:users_name,:users_familly_name,:users_login,:users_password,:users_email,:users_town,:users_post_code,:users_street,:users_street_number)");
    
            
            
            // $data = $query->execute([$name,$familly_name,$login,$password,$email,$town,$post_code,$street,$street_number]);
            $query->bindParam(':users_name',$users_name);
        
            $query->bindParam(':users_familly_name',$users_familly_name);
        
            $query->bindParam(':users_login',$users_login);
        
            $query->bindParam(':users_password',$users_password);
        
            $query->bindParam(':users_email',$users_email);
        
            $query->bindParam(':users_town',$users_town);
        
            $query->bindParam(':users_post_code',$int_post_code);
        
            $query->bindParam(':users_street',$users_street);
        
            $query->bindParam(':users_street_number',$int_street_number);
        
        

            $query->execute();
          
        }

        public function inDb($login)
        {
            $query = $this->db->query("SELECT * FROM {$this->table} WHERE {$this->column} = '$login'");
            $indb = $query->fetch();
            return $indb;
        }

        public function update($login,$password,$id)
        {

            $query = $this->db->prepare("UPDATE {$this->table} SET users_login = ?, users_password = ? WHERE users_id = ?");
            $query->execute([$login,$password,$id]);
            //UPDATE users SET login = 'bonjour', password = 'bonjour' WHERE login = 'salut'
        }


    }


?>