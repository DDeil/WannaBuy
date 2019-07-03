<?php
    include_once (ROOT . '\views\layout\header.php');
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
                    <div class="features_items">
                        <h2 class="title text-center">Корзина</h2>

                        <?php if($productsInCart):?>
                            <p>Вы выбрали такие товары:</p>
                            <table class="table-bordered table-striped table">
                                <tr>
                                    <th>Код товара</th>
                                    <th>Название</th>
                                    <th>Стоимость</th>
                                    <th>Количество, шт</th>
                                    <th class="text-center">Добавить - Удалить</th>
                                </tr>
                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td><?= $product['code']?></td>
                                        <td>
                                            <a href="/product/<?=$product['id']?>">
                                                <?=$product['name']?>
                                            </a>
                                        </td>
                                        <td><?=$product['price']?></td>
                                        <td><?=$cartProduct[$product['id']]?></td>
                                        <td class="text-center">
                                            <a class="" href="<?=SERVER_NAME?>/cart/add/<?=$product['id']?>">
                                                <i class="fa fa-plus-square"> </i>
                                            </a>

                                            <a href="<?=SERVER_NAME?>/cart/delete/<?=$product['id']?>">
                                                <i class="fa fa-minus-square"></i>
                                            </a>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="4">Общая стоимость:</td>
                                    <td><?=$totalPrice?></td>
                                </tr>
                            </table>

                            <div class="shop-menu pull-left">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?=SERVER_NAME?>/cart/checkOut"><i class="fa fa-shopping-cart"></i> Оформить заказ</a></li>

                                </ul>
                            </div>
                        <?php else:?>

                            <p>Корзина пуста!</p>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </section>


<?php
    include_once (ROOT . '\views\layout\footer.php');