

<p>
    <strong>Des appareilles menager concu pour durer,</strong></br>
    Pour une maison plus saine ...
    
</p>

<h1>Nos Gammes</h1>

<div id="carouselProduct" class="carousel slide" data-ride="carousel" data-interval="3000" style='border:solid grey;'>

    <ol class="carousel-indicators">
        <li data-target="#carouselProduct" data-slide-to="0" class="active"></li>
        <li data-target="#carouselProduct" data-slide-to="1"></li>
        <li data-target="#carouselProduct" data-slide-to="2"></li>
    </ol>


    <div class="carousel-inner">

       <?php 

        function carous($data)
        {
            foreach($data as $key => $categorie)
            {
               
                $item = "<div class='carousel-item active'>";
                $item .= "<a href='index.php?view=products&product_categorie=".$categorie['categories_id']."'><img class='d-block' src='Views/Public/Pictures/".mystring($categorie['categories_name']).".jpg'></a></div>";
            break;   
            }
            foreach($data as $key => $categorie)
            {
                
                $item .= "<div class='carousel-item'>";
                $item .= "<a href='index.php?view=products&product_categorie=".$categorie['categories_id']."'><img class='d-block' src='Views/Public/Pictures/".mydir("Views/Public/Pictures",$categorie['categories_name'])."'></a></div>";
            }
            return $item;

            
        }  
       
         
       ?>
       
        <?= carous($data) ?>

    </div>

    <a href="#carouselProduct" class="carousel-control-prev" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="ture"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a href="#carouselProduct" class="carousel-control-next" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

</div>



<?php 


?>