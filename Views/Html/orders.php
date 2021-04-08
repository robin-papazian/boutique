<?php

if (isset($_GET['detail'])) 
{
    $ref = $_GET['detail'];
    
    $order = $orders->listBy("INNER JOIN paniers ON products.products_id = paniers.paniers_product WHERE paniers_ref = $ref");

    // echo '<pre>';
    // var_dump($order);
    // echo '</pre>';
    $total = 0;
}

?>

<div class="card " style="width: 18rem;">
  <div class='d-flex'>
       <div>
           <div class="card-header">
               Commande
           </div>
           <ul class="list-group list-group-flush">
               <?php foreach($order as $detail) :?>
               <li class="list-group-item"><?= $detail['products_name']?> × <?=$detail['paniers_quantity']?></li>
               <?php endforeach ; ?>
               <li class="list-group-item">Moyen de Paiment</li> 
               <li class="list-group-item">Total</li>
           </ul>
       </div>
       <div>
           <div class="card-header">
               Detail
           </div>
           <ul class="list-group list-group-flush">
               <?php foreach($order as $detail) : $total += $detail['products_price'] * $detail['paniers_quantity']?>
               <li class="list-group-item"><?= $detail['products_price'] * $detail['paniers_quantity']?></li>
               <?php endforeach ; ?>
               <li class="list-group-item">Carte Bleu</li>  
               <li class="list-group-item"><?= $total?></li>

           </ul>
       </div>
   </div>

  

</div>