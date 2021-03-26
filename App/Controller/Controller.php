<?php

namespace App\Controller;



class Controller 
{
    protected $model;

    public function render(string $page,$variable = [])
    {
        ob_start();
        extract($variable);
        require('Views/Html/'.$page.'.php');
        $PageContent = ob_get_clean();
        require('Views/layout.php');

    }

    public function Myupload($action)
    {
        if($action == 'go')
        {
            $dir= "Views/Public/Pictures";
            $filename = basename($_FILES['fileToUpload']['name']);
            $place = $_FILES['fileToUpload']['tmp_name'];
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

}


?>