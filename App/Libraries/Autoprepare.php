<?php

     /**
      * @return array
      * Return an associative array witch will assist you
      * in your PDO prepare statement  
      */

    function autoprepare(array $array) :array
    {
        // if(isset($array['submit']))
        // {
        //     unset($array['submit']);
        // }
        foreach($array as $key => $value)
        {
        
            if($value == 'submit')
            {
                unset($array[$key]);
            }
        }

        $tableau = array(
            'set'      => '',
            'colonnes' => '',
            'unknow'   => '',
            'prepare'  => '',
            'execute'  => array());
           
        $set = '';
        $colone = '(';
        $unknow = '(';
        $prepare = '(';
        $execute = [];
        
        foreach($array as $key => $value)
        {
        
            if(!empty($value))
            {
                $set .= $key." = :$key,";
                $colone .= $key.',';
                $prepare .= ":$key,";
                $unknow .= "?,";   
            }
            else
            {
                unset($array[$key]);
            }    
        }

        $lastChar = strlen($set) -1 ;
        $set = substr_replace($set,'', $lastChar);
        $tableau['set'] = $set;

        $lastChar = strlen($colone) -1 ;
        $colone = substr_replace($colone,'', $lastChar);
        $colone .= ')';
        $tableau['colonnes'] = $colone;

        $lastChar = strlen($unknow) -1 ;
        $unknow = substr_replace($unknow,'', $lastChar);
        $unknow .= ')';
        $tableau['unknow'] = $unknow;

        $lastChar = strlen($prepare) -1 ;
        $prepare = substr_replace($prepare,'', $lastChar);
        $prepare .= ')';
        $tableau['prepare'] = $prepare;
        
        $tableau['execute'] = $array;

            
        return $tableau;
            
    }
    

?>