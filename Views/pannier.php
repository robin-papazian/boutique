<p>pannier</p>
<?php 

if(isset($_SESSION['pannier']))
{
    echo '<pre>';
    var_dump($_SESSION['pannier']);
    echo '<pre>';
    $id = array_keys($_SESSION['pannier']);
    var_dump($id);
    
    
    

    $c = $product->pannier($id);
    var_dump($c);
    
}


?>