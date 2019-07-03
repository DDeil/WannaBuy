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
                                        <h4 class="panel-title"><a href="/category/<?=$row['path']?>/" class="
                                        <?php if($row['path'] == $category) echo 'active'?>"><?=$row['name']?></a></h4>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Последние товары</h2>
                        <?php foreach ($productListByCategory as $productItem):?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?=Product::getImagesPatch($productItem['id'])?>" alt="" />
                                            <h2><?=$productItem['price']?>$</h2>

                                            <p>
                                                <a href="<?=SERVER_NAME?>/product/<?=$productItem['id']?>">
                                                    <?=$productItem['name']?>
                                                </a>
                                            </p>

                                            <a href="#" class="btn btn-default add-to-cart add" data-id="<?=$productItem['id']?>"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>

                                        <?php if($productItem['is_new']):?>
                                            <img src="<?=SERVER_NAME?>/template/images/home/new.png" class="new" alt/>
                                        <?php endif ?>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>



                    </div><!--features_items-->

                    <div class="text-center">
                        <ul class="pagination">

                            <?php

                            foreach ($pagination as $page){
                                switch ($page[0]){
                                    case Pagination::PRIV:
                                        echo "<li><a href='page_$page[1]'>&lt;</a></li>";
                                        break;
                                    case Pagination::PAGE:
                                        echo "<li><a href='page_$page[1]'>$page[1]</a></li>";
                                        break;
                                    case Pagination::ACTIVE:
                                        echo "<li class=\"active\"><a href='page_$page[1]'>$page[1]</a></li>";
                                        break;
                                    case Pagination::NEXT:
                                        echo "<li><a href='page_$page[1]'>&gt;</a></li>";
                                        break;
                                }
                            }

                            ?>

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php
include_once (ROOT.'\views\layout\footer.php');
