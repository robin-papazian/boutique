<?php

namespace App\Controller;

use App\Model\Model;

class Controller extends Model
{
    protected $table = 'users';
    protected $column = 'users_login';
    protected $view;

    public function render(string $page,$variable = [])
    {
        ob_start();
        extract($variable);
        require('Views/'.$page.'.php');
        $PageContent = ob_get_clean();
        require('Views/layout.php');

    }

    // public function getTableName()
    // {
    //     $classnamespace = get_class($this);
    //     $classnamespace = explode('\\',$classnamespace);
    //     $class = end($classnamespace);
    //     $class = strtolower($class);
    //     $table = str_replace('controller','',$class);
    //     return $table;

    // }

    public function SetDataForm($array)
    {
        if(isset($array['submit']))
        {
            unset($array['submit']);
            foreach($array as $key => $value)
            {
                $this->columnsname .= $key.",";
                $this->valuesname .= "?,"; 
            }
            $ciblecolumn = strlen($this->columnsname) -1 ;
            $this->columnsname = substr_replace($this->columnsname,'', $ciblecolumn);
            $this->columnsname .= ')';
            
            $ciblevalue = strlen($this->valuesname) -1 ;
            $this->valuesname = substr_replace($this->valuesname,'', $ciblevalue);
            $this->valuesname .= ')';
            return $array;    
        }
    }


    public function inscription($array)
    {

        if(isset($array))
        {
            extract($array);
       
            $user = $this->inDb($users_login);
            if(!$user)
            {
                $this->insertData($array);
                
            }
            else
            {
                return 'le login existe déja';    
            }

        }
        
        
    }

    public function connexion($array)
    {
        if(isset($array))
        {
            extract($array);
            $data = $this->inDb($login);
            if(!$data)
            {
                return 'Mauvaise identifiant';
            }
            else
            {
                $_SESSION['login'] = $data['users_login'];
                $_SESSION['id'] = $data['users_id'];
                
                header('Location:index.php?view=account');
            }      
        }
    }

    public function account($array)
    {
        if(isset($array))
        {
            extract($array);
            $id = $_SESSION['id'];
            $this->update($login,$password,$id);
            
        }    

    }

    
    


}


?>