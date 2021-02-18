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

        public function user($login,$password,$name,$familly_name,$town,$post_code,$street,$street_number,$email)
        {
            $int_post_code = intval($post_code);
            $int_street_number = intval($street_number);
            $query = $this->db->prepare("INSERT INTO {$this->table} (`users_login`, `users_password`,`users_name`,`users_familly_name`,`users_town`,`users_post_code`,`users_street`,`users_street_number`,`users_email`) VALUES (:users_login, :users_password, :users_name, :users_familly_name, :users_town, :users_post_code, :users_street, :users_street_number, :users_email)");
            $query->bindParam(':users_login',$login);
            $query->bindParam(':users_password',$password);
            $query->bindParam(':users_name',$name);
            $query->bindParam(':users_familly_name',$familly_name);
            $query->bindParam(':users_town',$town);
            $query->bindParam(':users_post_code',$int_post_code);
            $query->bindParam(':users_street',$street);
            $query->bindParam(':users_street_number',$int_street_number);
            $query->bindParam(':users_email',$email);

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