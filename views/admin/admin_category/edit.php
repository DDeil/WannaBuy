<?php include_once (ROOT . '\views\layout\header_admin.php');?>

    <div class="container">
        <div class="row">
            <div class="col-sm-offset-1 ">
                <div class="padding-right">
                    <h4><a href="<?=SERVER_NAME?>/admin">Главная</a></h4>

                    <div class="panel">
                        <ul class="nav navbar-left navbar-collapse">
                            <li><a href="<?=SERVER_NAME?>/admin/category">Управление категориями</a> </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
                <div class="login-form">

                    <h4>Редактирование категории</h4>

                    <form action="#" method="post">
                            <table class="table table-striped">
                            <tr>
                                <td class="text-right"><p>Название категории</p></td>
                                <td><input type="text" name = "name" value="<?=$editCategoryItems['name']?>"/></td>
                            </tr>
                            <tr>
                                <td class="text-right"> <p>Путь URL</p></td>
                                <td><input type="text" name = "path" value="<?=$editCategoryItems['path']?>"/></td>
                            </tr>
                            <tr>
                                <td class="text-right"> <p>Порядковый номер</p></td>
                                <td><input type="text" name = "sort_order" value="<?=$editCategoryItems['sort_order']?>"/></td>
                            </tr>
                            <tr>
                                <td class="text-right"><p>Статус</p></td>
                                <td><select name="status">
                                        <option value="1" <?php if($editCategoryItems['status'] > 0)echo 'selected="selected"';?>>Отображать</option>
                                        <option value="0" <?php if($editCategoryItems['status'] <= 0)echo 'selected="selected"';?>>Скрыть</option>
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