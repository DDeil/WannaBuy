<?php include_once (ROOT . '\views\layout\header_admin.php');?>

    <div class="container">
        <div class="row">
            <div class="col-sm-offset-1 ">
                <div class="padding-right">
                    <h4><a href="<?=SERVER_NAME?>/admin">Главная</a></h4>

                    <div class="panel">
                        <ul class="nav navbar-left navbar-collapse">
                            <li><a href="<?=SERVER_NAME?>/admin/order">Управление заказами</a> </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
                <div class="login-form">

                    <h4>Редактирование заказа</h4>

                    <form action="#" method="post">
                            <table class="table table-striped">
                            <tr>
                                <td class="text-right"><p>Имя клиента</p></td>
                                <td><input type="text" name = "name" value="<?=$editOrder['user_name']?>"/></td>
                            </tr>
                            <tr>
                                <td class="text-right"> <p>Номер телефона</p></td>
                                <td><input type="text" name = "phone" value="<?=$editOrder['user_phone']?>"/></td>
                            </tr>
                            <tr>
                                <td class="text-right"> <p>E-mail</p></td>
                                <td><input type="text" name = "email" value="<?=$editOrder['user_email']?>"/></td>
                            </tr>
                            <tr>
                                <td class="text-right"> <p>Время заказа</p></td>
                                <td><input type="text" name = "date" value="<?=$editOrder['date']?>"/></td>
                            </tr>
                            <tr>
                                <td class="text-right"><p>Статус</p></td>
                                <td><select name="status">
                                        <option value="1"
                                            <?php if($editOrder['status'] == 1)echo 'selected="selected"';?>>
                                            <?=Order::statusEncode(1)?>
                                        </option>
                                        <option value="0"
                                            <?php if($editOrder['status'] == 0)echo 'selected="selected"';?>>
                                            <?=Order::statusEncode(0)?>
                                        </option>
                                        <option value="2"
                                            <?php if($editOrder['status'] == 2)echo 'selected="selected"';?>>
                                            <?=Order::statusEncode(2)?>
                                        </option>
                                        <option value="3"
                                            <?php if($editOrder['status'] == 3)echo 'selected="selected"';?>>
                                            <?=Order::statusEncode(3)?>
                                        </option>
                                    </select></td>
                            </tr>
                        </table>

                        <button type="submit" name = "submit" class="btn btn-default center-block" value="Добавить">Изминить</button>
                        <br>

                    </form>
                </div>
        </div>
    </div>

<?php include_once (ROOT . '\views\layout\footer_admin.php');