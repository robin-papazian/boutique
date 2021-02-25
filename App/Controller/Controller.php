<?php

namespace App\Controller;

use App\Model\Model;

class Controller extends Model
{

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

    public function formScrapping($array)
    {
        if(isset($array['submit']))
        {
            unset($array['submit']);

            $this->columnsname = "(";
            $this->valuesname = "(";

            foreach($array as $key => $value)
            {
                $this->columnsname .= $key.",";
                $this->valuesname .= "?,"; 
            }
            
            $lastcolumn = strlen($this->columnsname) -1 ;
            $this->columnsname = substr_replace($this->columnsname,'', $lastcolumn);
            $this->columnsname .= ')';
            
            $lastvalue = strlen($this->valuesname) -1 ;
            $this->valuesname = substr_replace($this->valuesname,'', $lastvalue);
            $this->valuesname .= ')';
            
            return $array;    
        }

        
    }

    public function list()
    {
        $items = $this->stickOut();
        return $items;
    }

    public function item($id)
    {
        $product = $this->stickOut('WHERE ',$this->table.'_categorie = ',$id);
        return $product;
    }




    
    


}


?>