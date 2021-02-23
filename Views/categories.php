<p>categorie des produit</p>
<?php foreach($data as $categorie)
{
    echo "<a href='index.php?view=categories&categorie=$categorie[0]'>".$categorie[1]."</a></br>";
}
?>