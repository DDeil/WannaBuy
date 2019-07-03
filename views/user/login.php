<?php
include_once (ROOT.'\views\layout\header.php');
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <div class="signup-form">
                        <h2>Вход на сайте</h2>
                        <form action="#" method="post">


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

                        <button type="submit" name = "submit" class="btn btn-default center-block" value="Enter">Войти</button>



                        </form>

                        <div class="container ">
                            <a href="<?=SERVER_NAME?>/user/register">Регистрация</a>
                        </div>

                    </div>

            </div>


        </div>
    </div>

    <br>
    <br>
    <br>

</section>

<?php
include_once (ROOT.'\views\layout\footer.php');

