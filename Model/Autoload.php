<?php


    function autoload($myclass)
    {
        $filepath = str_replace('\\', '/', $myclass)  . '.php';
        require $filepath;
    }


?>