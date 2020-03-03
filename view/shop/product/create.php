<?php require_once 'view/shop/layout/header.php' ?>

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="product_grid" style="position: relative; height: 884.2px;">



                        <!-- Product -->
                        <div class="product" style="position: absolute; left: 292px; top: 0px;">
        <?php if(!empty($data)): ?>

                 <?php foreach($data as $item):

                ?>
                                    <div class="product_image"><img src="<?= $item['image'] ?>" alt=""></div>
                                    <div class="product_extra product_sale"><a href="categories.html">Sale</a></div>
                                    <div class="product_content">
                                        <div class="product_title"><a href="product.html"><?= $item['name'] ?></a></div>
                                        <div class="product_price"><?= $item['price']?> VND</div>
                                    </div>
                <?php endforeach; ?>

         <?php endif;?>

                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </div>
<?php require_once 'view/shop/layout/footer.php' ?>