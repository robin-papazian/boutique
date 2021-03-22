<?php

namespace App\Controller;



class Controller 
{
    protected $model;


    public function render(string $page,$variable = [])
    {
        ob_start();
        extract($variable);
        require('Views/'.$page.'.php');
        $PageContent = ob_get_clean();
        require('Views/layout.php');

    }

    // public function SetModel() 
    // {
    //     $class = get_class($this);
    //     $class = str_replace('Controller','Model',$class);
    //     $model = explode('\\',$class);
    //     $model = end($model);
    //     $model = $model.";";
    //     return new $model;

    // }


    // public function formScrapping($array)
    // {
    //     if(isset($array['submit']))
    //     {
    //         unset($array['submit']);

    //         $this->columnsname = "(";
    //         $this->valuesname = "(";

    //         foreach($array as $key => $value)
    //         {
    //             $this->columnsname .= $key.",";
    //             $this->valuesname .= "?,"; 
    //         }
            
    //         $lastcolumn = strlen($this->columnsname) -1 ;
    //         $this->columnsname = substr_replace($this->columnsname,'', $lastcolumn);
    //         $this->columnsname .= ')';
            
    //         $lastvalue = strlen($this->valuesname) -1 ;
    //         $this->valuesname = substr_replace($this->valuesname,'', $lastvalue);
    //         $this->valuesname .= ')';
            
    //         return $array;    
    //     }

        
    // }








    
    


}


?>