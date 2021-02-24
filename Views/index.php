<p>acceuil</p>


<?php 


foreach($data as $product)
{
    echo "<a href='index.php?view=products&product=$product[0]'>".$product[1]."</a></br>";
}

?>