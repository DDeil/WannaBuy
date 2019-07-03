<?php include_once (ROOT . '\views\layout\header_admin.php');?>

    <div class="container">
        <div class="row">
            <div class="col-sm-offset-1 ">
                <div class="padding-right">
                    <h4><a href="<?=SERVER_NAME?>/admin">Главная</a></h4>

                    <div class="panel">
                        <ul class="nav navbar-left navbar-collapse">
                            <li><a href="<?=SERVER_NAME?>/admin/category"> Управление категориями <i class="fa fa-minus"></i></a></li>
                            <li>
                                <ul class="nav navbar-collapse">
                                    <li><a href="<?=SERVER_NAME?>/admin/category/add">Добавить категорию</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

                <div class="form-group">
                    <h4>Список категорий</h4>
                    <table class="table table-striped">
                        <tr>
                            <th>ID </th>
                            <th>Название Категории</th>
                            <th>Порядковый номер</th>
                            <th colspan="3">статус</th>

                        </tr>

                        <?php foreach ($categoryList as $row): ?>
                            <tr>
                                <td><?=$row['id']?></td>
                                <td><a href="<?=SERVER_NAME?>/category/<?=$row['path']?>"><?=$row['name']?></a> </td>
                                <td><?=$row['sort_order']?></td>
                                <td><?php if($row['status']){echo 'Отображаеться';}else{echo 'Скрыто';}?></td>
                                <td><a href="<?=SERVER_NAME?>/admin/category/edit/<?=$row['id']?>"><i class="fa fa-edit"></i> </a> </td>
                                <td><a href="<?=SERVER_NAME?>/admin/category/delete/<?=$row['id']?>"><i class="fa fa-trash-o"></i> </a> </td>
                            </tr>

                        <?php endforeach; ?>


                    </table>
                </div>
            </div>
        </div>
    </div>

<?php include_once (ROOT . '\views\layout\footer_admin.php');