<div class="bg-image">
    <p class="d-flex justify-content-center text-light">
        <strong>Des appareilles menager concu pour durer,</strong></br>
        Pour une maison plus saine ...

    </p>

    <h1 class="d-flex justify-content-center text-light">Nos Gammes</h1>

    <div id="carouselProduct" class="carousel slide shadow-lg p-3 mb-5 bg-dark rounded" data-ride="carousel" data-interval="3000">

        <ol class="carousel-indicators">
            <li data-target="#carouselProduct" data-slide-to="0" class="active"></li>
            <li data-target="#carouselProduct" data-slide-to="1"></li>
            <li data-target="#carouselProduct" data-slide-to="2"></li>
        </ol>


        <div class="carousel-inner">

            <?php

            function carous($data)
            {
                foreach ($data as $key => $categorie) {

                    $item = "<div class='carousel-item active'>";
                    $item .= "<a href='index.php?view=products&product_categorie=" . $categorie['categories_id'] . "'><img class='d-block' src='Views/Public/Pictures/" . mydir("Views/Public/Pictures", $categorie['categories_name']) . "'></a></div>";
                    break;
                }
                foreach ($data as $key => $categorie) {

                    $item .= "<div class='carousel-item'>";
                    $item .= "<a href='index.php?view=products&product_categorie=" . $categorie['categories_id'] . "'><img class='d-block' src='Views/Public/Pictures/" . mydir("Views/Public/Pictures", $categorie['categories_name']) . "'></a></div>";
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
    <div class="d-flex row justify-content-center">
        <?php

        foreach ($result as $tab) {
        ?>
            <div class='card bg-dark col-sm-3 m-3 mb-5' style='width: 18rem;'>
                <img src='Views/Public/Pictures/<?= mydir("Views/Public/Pictures", $tab['products_name']) ?>' class='card-img-top' alt='product jpg'>
                <div class='card-body'>
                    <h5 class='card-title text-light'><?= $tab['products_name'] ?></h5>
                    <p><img src="Views/Public/Pictures/new.png" alt="new"></p>
                    <a class="text-light" href="index.php?view=item&product=<?= $tab['products_id'] ?>">Voir le produit</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>