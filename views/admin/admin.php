<?php include_once (ROOT . '\views\layout\header_admin.php');?>
<div class="container">
    <div class="row">
        <div class="col-sm-offset-1">
            <div class="pull-left">
                <h4>Главная</h4>
                <div class="panel">
                    <ul class="nav navbar-left navbar-collapse">
                        <li><a href="<?=SERVER_NAME?>/admin/product">Управление товарами</a> </li>
                        <li><a href="<?=SERVER_NAME?>/admin/category">Управление категориями</a> </li>
                        <li><a href="<?=SERVER_NAME?>/admin/order">Управление заказами</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once (ROOT . '\views\layout\footer_admin.php');