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
                    <h4>Список заказов</h4>
                    <table class="table table-striped">
                        <tr>
                            <th>ID </th>
                            <th>Имя клиента</th>
                            <th>Номер телефона</th>
                            <th>Email</th>
                            <th>Время заказа</th>
                            <th colspan="4">Статус</th>

                        </tr>

                        <?php foreach ($orderList as $row): ?>
                            <tr>
                                <td><?=$row['id']?></td>
                                <td><?=$row['user_name']?></td>
                                <td><?=$row['user_phone']?></td>
                                <td><?=$row['user_email']?></td>
                                <td><?=$row['date']?></td>
                                <td><?=Order::statusEncode($row['status'])?></td>
                                <td><a href="<?=SERVER_NAME?>/admin/order/edit/<?=$row['id']?>"><i class="fa fa-edit"></i> </a> </td>
                                <td><a href="<?=SERVER_NAME?>/admin/order/view/<?=$row['id']?>"><i class="fa fa-eye"></i> </a> </td>
                                <td><a href="<?=SERVER_NAME?>/admin/order/delete/<?=$row['id']?>"><i class="fa fa-trash-o"></i> </a> </td>
                            </tr>

                        <?php endforeach; ?>


                    </table>
                </div>
            </div>
        </div>
    </div>

<?php include_once (ROOT . '\views\layout\footer_admin.php');