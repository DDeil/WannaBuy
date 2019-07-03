<?php
include (ROOT.'\views\layout\header.php');
?>

    <section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php foreach ($categoryList as $row):?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="/category/<?=$row['path']?>/"><?=$row['name']?></a></h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div><!--/category-products-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="<?=Product::getImagesPatch($productItem['id'])?>" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <?php if($productItem['is_new']):?>
                                    <img src="<?=SERVER_NAME?>/template/images/product-details/new.jpg" class="newarrival" alt="" />
                                <?php endif ?>

                                <h2><?=$productItem['name']?></h2>
                                <p>Код товара: <?=$productItem['code']?></p>
                                <span>
                                            <span>US $<?=$productItem['price']?></span>
                                            <label>Количество:</label>
                                            <input type="text" value="1" />
                                            <a href="<?=SERVER_NAME?>/cart/add/<?=$productItem['id']?>" type="button" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                В корзину
                                            </a>
                                        </span>
                                <p><b>Наличие:</b> На складе</p>
                                <p><b>Состояние:</b> Новое</p>
                                <p><b>Производитель:</b> <?=$productItem['brand']?></p>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>Описание товара</h5>
                            <?=$productItem['description']?>
                        </div>
                    </div>
                </div><!--/product-details-->

            </div>
        </div>
    </div>
</section>


<br/>
<br/>
<?php
include (ROOT.'\views\layout\footer.php');