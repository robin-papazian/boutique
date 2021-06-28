<div class="container-index">


    <h2>Nos Gammes</h2>

    <!-- GAMMES -->
    <div class="container-categorie">
        <?php
        foreach ($data as $categorie) {
            $box = "<div class='box-categorie'>";
            $box .= "<a href='index.php?view=products&product_categorie=" . $categorie['categories_id'] . "'>" . "<img src='Views/Public/Pictures/" . mydir("Views/Public/Pictures", $categorie['categories_name']) . "'></a></div>";
            echo $box;
        }
        ?>
    </div>


    <h2>Nos services</h2>
    <div class="container margin-auto">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-service text-center">
                    <i class="fa fa-home"></i>
                    <h3>Compagny</h3>
                    <hr>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, itaque sint? Sed atque rem molestias amet eaque tempore dolores eius.
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-service text-center">
                    <i class="fab fa-servicestack"></i>
                    <h3>Compagny</h3>
                    <hr>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, itaque sint? Sed atque rem molestias amet eaque tempore dolores eius.
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-service text-center">
                    <i class="fa fa-home"></i>
                    <h3>Compagny</h3>
                    <hr>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, itaque sint? Sed atque rem molestias amet eaque tempore dolores eius.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <h2>Nos nouveauté</h2>

    <div class="container-categorie">
        <?php
        foreach ($result as $products) {
            $box = "<div class='box-categorie'>";
            $box .= "<a href='index.php?view=item&product=" . $products['products_id'] . "'>" . "<img src='Views/Public/Pictures/" . mydir("Views/Public/Pictures", $products['products_name']) . "'></a></div>";
            echo $box;
        }
        ?>
    </div>


</div>