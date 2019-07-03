<?php
include_once (ROOT.'\views\layout\header.php');
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">

                        <?php foreach ($categoryList as $row):?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="/category/<?=$row['path']?>/"><?=$row['name']?></a></h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Последние товары</h2>
                    <?php foreach ($lastProductList as $productItem):?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?=Product::getImagesPatch($productItem['id'])?>" alt="" />
                                        <h2><?=$productItem['price']?> руб</h2>

                                        <p>
                                            <a href="product/<?=$productItem['id']?>">
                                                <?=$productItem['name']?>
                                            </a>
                                        </p>

                                        <a href="<?=SERVER_NAME?>/cart/add/<?=$productItem['id']?>"
                                           class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                    </div>

                                    <?php if($productItem['is_new']):?>
                                        <img src="<?=SERVER_NAME?>/template/images/home/new.png" class="new" alt/>
                                    <?php endif ?>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>

                </div><!--features_items-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Рекомендуемые товары</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                                $active='active';

                                while (current($recommendedList)):
                                    $itemsCount = 0;?>

                                    <div class="item <?=$active?>">

                                    <?php
                                        if($active){
                                            $active = false;
                                        }

                                        while($recommendedItem = current($recommendedList) and $itemsCount < 3):?>

                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="<?=Product::getImagesPatch($recommendedItem['id'])?>" alt="" />
                                                            <h2><?=$recommendedItem['price']?> руб</h2>
                                                            <p>
                                                                <a href="<?=SERVER_NAME?>/product/<?=$recommendedItem['id']?>">
                                                                    <?=$recommendedItem['name']?>
                                                                </a>
                                                            </p>
                                                            <a href="<?=SERVER_NAME?>/cart/add/<?=$productItem['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    <?
                                        $itemsCount++;
                                        next($recommendedList);

                                        endwhile;
                                    ?>

                                </div>

                            <?php endwhile;?>


                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>
<?php
include_once (ROOT.'\views\layout\footer.php');
