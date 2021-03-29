<?php

    function mydir($path,$picture)
    {
        $files = scandir($path);
        $picture = strtolower($picture);
        $picture = str_replace(' ','',$picture);
        foreach($files as $result)
        {
            
            if($result == $picture.'.jpg' )
            {
                return $result;
            }
            elseif($result == $picture.'.jpeg')
            {
                return $result;
            }
            elseif($result == $picture.'.png')
            {
                return $result;
            }
            

        }
    }

?>