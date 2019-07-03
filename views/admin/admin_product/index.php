<?php include_once (ROOT . '\views\layout\header_admin.php');?>

    <div class="container">
        <div class="row">
            <div class="col-sm-offset-1 ">
                <div class="padding-right">
                    <h4><a href="<?=SERVER_NAME?>/admin">Главная</a></h4>

                    <div class="panel">
                        <ul class="nav navbar-left navbar-collapse">
                            <li><a href="<?=SERVER_NAME?>/admin/product"> Управление товарами <i class="fa fa-minus"></i></a></li>
                            <li>
                                <ul class="nav navbar-collapse">
                                    <li><a href="<?=SERVER_NAME?>/admin/product/add">Добавить продукт</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

                <div class="form-group">
                    <h4>Список товаров</h4>
                    <table class="table table-striped">
                        <tr>
                            <th>ID товара</th>
                            <th>Артикул</th>
                            <th>Название</th>
                            <th colspan="3">Цена</th>

                        </tr>

                        <?php foreach ($productList as $row):?>
                            <tr>
                                <td><?=$row['id']?></td>
                                <td><?=$row['code']?></td>
                                <td><a href="<?=SERVER_NAME?>/product/<?=$row['id']?>"><?=$row['name']?></a> </td>
                                <td><?=$row['price']?></td>
                                <td><a href="<?=SERVER_NAME?>/admin/product/edit/<?=$row['id']?>"><i class="fa fa-edit"></i> </a> </td>
                                <td><a href="<?=SERVER_NAME?>/admin/product/delete/<?=$row['id']?>"><i class="fa fa-trash-o"></i> </a> </td>
                            </tr>

                        <?php endforeach; ?>


                    </table>
                </div>
            </div>
        </div>
    </div>

<?php include_once (ROOT . '\views\layout\footer_admin.php');