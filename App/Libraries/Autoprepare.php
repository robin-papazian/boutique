<?php

     /**
      * @return array
      * Return an associative array witch will assist you
      * in your PDO prepare statement  
      */

    function autoprepare(array $array) :array
    {
        $tableau = array('prepare' => '',
                         'execute'  => array());
        $prepare = '(';
        $execute = [];
        foreach($array as $key)
        {
            $prepare .= "?,";
            array_push($execute,$key);
                
    
        }
        $lastChar = strlen($prepare) -1 ;
        $prepare = substr_replace($prepare,'', $lastChar);
        $prepare .= ')';
        $tableau['prepare'] = $prepare;
    
        // $lastChar = strlen($execute) -1 ;
        // $execute = substr_replace($execute,'', $lastChar);
        // $execute .= ')';
        $tableau['execute'] = $execute;
            
        return $tableau;
            
    }
    

?>