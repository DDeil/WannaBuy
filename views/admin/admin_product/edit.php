<?php include_once (ROOT . '\views\layout\header_admin.php');?>

    <div class="container">
        <div class="row">
            <div class="col-sm-offset-1 ">
                <div class="padding-right">
                    <h4><a href="<?=SERVER_NAME?>/admin">Главная</a></h4>

                    <div class="panel">
                        <ul class="nav navbar-left navbar-collapse">
                            <li><a href="<?=SERVER_NAME?>/admin/product">Управление товарами</a> </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
                <div class="login-form">

                    <h4>Редактирование параметров товара</h4>

                    <form action="#" method="post" enctype="multipart/form-data">
                            <table class="table table-striped">
                            <tr>
                                <td class="text-right"><p>Название товара</p></td>
                                <td><input type="text" name = "name" value="<?=$editProduct['name']?>"/></td>
                            </tr>

                            <tr>
                                <td class="text-right"> <p>Категория</p></td>
                                <td>
                                    <select name="category">
                                        <?php foreach ($categoryList as $row):?>
                                            <option value="<?=$row['id']?>" <?php if($editProduct['category_id'] == $row['id'])echo 'selected="selected"';?>><?=$row['name']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-right"> <p>Артикул</p></td>
                                <td><input type="text" name="code" value="<?=$editProduct['code']?>"/></td>
                            </tr>

                            <tr>
                                <td class="text-right"> <p>Стоимость</p></td>
                                <td><input type="text" name="price" placeholder="" value="<?=$editProduct['price']?>"/></td>
                            </tr>

                            <tr>
                                <td class="text-right"> <p>Изображение</p></td>
                                <td>
                                    <img src="<?= Product::getImagesPatch($id)?>"></img>
                                    <input type="file" name="image" placeholder=""/>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-right"><p>Описание</p></td>
                                <td><textarea name="description" ><?=$editProduct['description']?></textarea></td>
                            </tr>

                            <tr>
                                <td class="text-right"><p>На складе</p></td>
                                <td><select name="availability">
                                        <option value="1" <?php if($editProduct['availability'] > 0)echo 'selected="selected"';?>>Да</option>
                                        <option value="0" <?php if($editProduct['availability'] <= 0)echo 'selected="selected"';?>>Нет</option>
                                    </select></td>
                            </tr>

                            <tr>
                                <td class="text-right"><p>Новика</p></td>
                                <td><select name="is_new">
                                        <option value="1" <?php if($editProduct['is_new'] > 0)echo 'selected="selected"';?>>Да</option>
                                        <option value="0" <?php if($editProduct['is_new'] <= 0)echo 'selected="selected"';?>>Нет</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td class="text-right"><p>Рекомендуемые</p></td>
                                <td><select name="is_recommended">
                                        <option value="1" <?php if($editProduct['is_recommended'] > 0)echo 'selected="selected"';?>>Да</option>
                                        <option value="0" <?php if($editProduct['is_recommended'] <= 0)echo 'selected="selected"';?>>Нет</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td class="text-right"><p>Статус</p></td>
                                <td><select name="status">
                                        <option value="1" <?php if($editProduct['status'] > 0)echo 'selected="selected"';?>>Да</option>
                                        <option value="0" <?php if($editProduct['status'] <= 0)echo 'selected="selected"';?>>Нет</option>
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