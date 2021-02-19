<?php

namespace App\Controller;

use App\Model\Model;

class Controller extends Model
{

    protected $column = 'users_login';
    protected $view;

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->getTableName();
    }

    public function render(string $page,$variable = [])
    {
        ob_start();
        extract($variable);
        require('Views/'.$page.'.php');
        $PageContent = ob_get_clean();
        require('Views/layout.php');

    }

    public function getTableName()
    {
        $classnamespace = get_class($this);
        $classnamespace = explode('\\',$classnamespace);
        $class = end($classnamespace);
        $class = strtolower($class);
        $table = str_replace('controller','',$class);
        return $table;

    }

    public function getColumnsName($array)
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




    
    


}


?>