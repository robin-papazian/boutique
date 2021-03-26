<?php

    function mystring($param)
    {
        $param = strtolower($param);
        $param = str_replace(' ','',$param);
        return $param;

    }

?>