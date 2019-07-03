<?php
    include_once (ROOT . '\views\layout\header.php');
?>
<section>
    <div class="container">
        <h1>Кабинет пользователя!</h1>

        <p><a href="">Редактирование данных</a></p>

        <p> <a href="">Список покупок</a></p>

        <?php
            if(AdminBase::checkAdmin()):?>
                <p> <a href="<?=SERVER_NAME?>/admin">Админ панель</a></p>
            <?php endif;
        ?>
    </div>
    <br>
</section>
<?php
    include_once (ROOT . '\views\layout\footer.php');