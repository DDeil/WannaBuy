<?php include_once (ROOT . '\views\layout\header_admin.php');?>

    <div class="container">
        <div class="row">
            <div class="col-sm-offset-1 ">
                <div class="padding-right">
                    <h4><a href="<?=SERVER_NAME?>/admin">Главная</a></h4>

                    <div class="panel">
                        <ul class="nav navbar-left navbar-collapse">
                            <li><a href="<?=SERVER_NAME?>/admin/order"> Управление заказами <i class="fa fa-minus"></i></a></li>
                            <li>
                                <ul class="nav navbar-collapse">
                                    <li><a href="<?=SERVER_NAME?>/admin/order/add">Добавить заказ</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

                <div class="form-group">
                    <h4>Информация о заказе</h4>
                    <table class="table table-striped">
                            <tr>
                                <th>ID заказа</th>
                                <td><?=$orderView['id']?></td>
                            </tr>
                            <tr>
                                <th>Имя клиента</th>
                                <td><?=$orderView['user_name']?></td>
                            </tr>
                            <tr>
                                <th>Номер телефона</th>
                                <td><?=$orderView['user_phone']?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?=$orderView['user_email']?></td>
                            </tr>
                            <tr>
                                <th>Время заказа</th>
                                <td><?=$orderView['date']?></td>
                            </tr>
                        <tr>
                            <th>Коментарий пользователя</th>
                            <td><?=$orderView['user_comment']?></td>
                        </tr>
                        <tr>
                            <th>ID пользователя</th>
                            <td><?=$orderView['user_id']?></td>
                        </tr>
                        <tr>
                            <th>Статус</th>
                            <td><?=Order::statusEncode($orderView['status'])?></td>
                        </tr>

                    </table>

                    <?php if($productInCartDetail):?>
                        <p>Заказаные товары</p>
                        <table class="table-bordered table-striped table">
                            <tr>
                                <th>Код товара</th>
                                <th>Название</th>
                                <th>Стоимость</th>
                                <th>Количество, шт</th>
                            </tr>
                            <?php foreach ($productInCartDetail as $product): ?>
                                <tr>
                                    <td><?= $product['code']?></td>
                                    <td>
                                        <a href="/product/<?=$product['id']?>">
                                            <?=$product['name']?>
                                        </a>
                                    </td>
                                    <td><?=$product['price']?></td>
                                    <td><?php echo($orderView['product'][$product['id']])?></td>

                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="3">Общая стоимость:</td>
                                <td><?=$totalPrice?></td>
                            </tr>
                        </table>
                    <?php else: ?>
                        <p>Корзина пуста!</p>

                    <?endif; ?>


                </div>
            </div>
        </div>
    </div>

<?php include_once (ROOT . '\views\layout\footer_admin.php');