<?php

function Myupload($action)
{
    
    if($action == 'go')
    {
        $dir= "Views/Public/Pictures";
        $filename = basename($_FILES['file']['name']);
        var_dump($filename);
        $place = $_FILES['file']['tmp_name'];
        $type = strtolower(pathinfo($filename,PATHINFO_EXTENSION));

        if($type != 'jpg' && $type != 'png' && $type != 'jpeg')
        {
            $action = 'format incorrecte !';
        }
        elseif(file_exists("$dir/$filename"))
        {
            $action = 'Image déja existente';
        }
        else
        {
            $action = 'Image sauvegarder !';
            move_uploaded_file($place,"$dir/$filename");
        }
        return $action;  
    }
}

?>