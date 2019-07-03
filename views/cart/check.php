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

                        <?php if($result):?>

                            <p>Заказ оформлен, мы вам перезвоним</p>
                        <?php else:?>
                            <div class="col-sm-6 col-sm-offset-0 padding-right">
                                <div class="signup-form">
                                    <p>Выбранно товаров: <?=$countItemms?></p>
                                    <p>Общая сума заказа: <?=$productPrice?></p>

                                    <form action="#" method="post">

                                        <?php if(isset($error['name'])):?>
                                            <div class="container">
                                                <label class=" alert-warning  "> <?=$error['name']?> </label>
                                            </div>
                                        <?php endif;?>
                                        <input type="text" name = "name" placeholder="Имя" value="<?=$user['name']?>"/>

                                        <?php if(isset($error['phone'])):?>
                                            <div class="container">
                                                <label class=" alert-warning  "> <?=$error['phone']?> </label>
                                            </div>
                                        <?php endif;?>
                                        <input type="text" name = "phone" placeholder="Телефон" value="<?=$user['phone']?>"/>



                                        <?php if(isset($error['email'])):?>
                                            <div class="container">
                                                <label class=" alert-warning  "> <?=$error['email']?> </label>
                                            </div>
                                        <?php endif;?>
                                        <input type="email" name = "email" placeholder="E-mail" value="<?=$user['email']?>"/>



                                        <input type="text" name = comment placeholder="Коментарий к заказу"/>

                                        <button type="submit" name = "submit" class="btn btn-default center-block" value="confirm">Оформить</button>
                                    </form>
                                </div>
                            </div>

                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </section>

<?php
include_once (ROOT . '\views\layout\footer.php');