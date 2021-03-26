<?php

function Myupload($action)
{
    if($action == 'go')
    {
        $dir= "Views/Public/Pictures";
        $filename = basename($_FILES['file']['name']);
        $place = $_FILES['file']['tmp_name'];
        $type = strtolower(pathinfo($filename,PATHINFO_EXTENSION));

        if($type != 'jpg' && $type != 'png' && $type != 'jpeg')
        {
            $message = 'format incorrecte !';
        }
        elseif(file_exists("$dir/$filename"))
        {
            $message = 'Image déja existente';
        }
        else
        {
            $message = 'Image sauvegarder !';
            move_uploaded_file($place,"$dir/$filename");
        }
        return $message;  
    }
}

?>