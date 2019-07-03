<?php
include_once (ROOT.'\views\layout\header.php');
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if($registrResult == 1):?>
                    <div class="signup-form">
                        <h3>Поздравляю, вы зарегестрированы!</h3>
                    </div>
                <?php endif;
                if($registrResult != 1):
                    if($registrResult == 2):?>
                        <div class="container">
                            <label class=" alert-warning  "> Ошибка регистрации пользователя! </label>
                        </div>
                    <?php endif;?>
                    <div class="signup-form">
                        <h2>Регистрация на сайте</h2>
                        <form action="#" method="post">

                            <?php if(isset($error['name'])):?>
                                <div class="container">
                                    <label class=" alert-warning  "> <?=$error['name']?> </label>
                                </div>
                            <?php endif;?>
                            <input type="text" name = "name" placeholder="Имя" value="<?=$name?>"/>

                            <?php if(isset($error['email'])):?>
                                <div class="container">
                                    <label class=" alert-warning  "> <?=$error['email']?> </label>
                                </div>
                            <?php endif;?>
                            <input type="email" name = "email" placeholder="E-mail" value="<?=$email?>"/>

                            <?php if(isset($error['password'])):?>
                                <div class="container">
                                    <label class=" alert-warning  "> <?=$error['password']?> </label>
                                </div>
                            <?php endif;?>
                            <input type="password" name = password placeholder="Пароль"/>
                        <button type="submit" name = "submit" class="btn btn-default center-block" value="Registred">Регистрация</button>
                        </form>
                    </div>
                <?php endif;?>

            </div>


        </div>
    </div>

    <br>
    <br>
    <br>

</section>

<?php
include_once (ROOT.'\views\layout\footer.php');

