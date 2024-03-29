<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Главная</title>
    <link href="<?=SERVER_NAME?>/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=SERVER_NAME?>/template/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=SERVER_NAME?>/template/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?=SERVER_NAME?>/template/css/price-range.css" rel="stylesheet">
    <link href="<?=SERVER_NAME?>/template/css/animate.css" rel="stylesheet">
    <link href="<?=SERVER_NAME?>/template/css/main.css" rel="stylesheet">
    <link href="<?=SERVER_NAME?>/template/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?=SERVER_NAME?>/template/js/html5shiv.js"></script>
    <script src="<?=SERVER_NAME?>/template/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?=SERVER_NAME?>/template/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=SERVER_NAME?>/template/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=SERVER_NAME?>/template/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=SERVER_NAME?>/template/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?=SERVER_NAME?>/template/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +38 093 000 11 22</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> zinchenko.us@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="<?=SERVER_NAME?>/template/images/home/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="<?=SERVER_NAME?>/cart"><i class="fa fa-shopping-cart"></i> Корзина
                                    (<span id="cart-count"><?=Cart::countCartItems()?></span>)</a></li>
                           <?php if(User::getAuthUser()):?>
                               <li><a href="<?=SERVER_NAME?>/cabinet"><i class="fa fa-user"></i> Аккаунт</a></li>
                               <li><a href="<?=SERVER_NAME?>/user/logout"><i class="fa fa-unlock"></i> Выход</a></li>
                            <?php else:?>
                                <li><a href="<?=SERVER_NAME?>/user/login"><i class="fa fa-lock"></i> Вход</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/">Главная</a></li>
                            <li class="dropdown"><a href="/">Магазин<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="/catalog/">Каталог товаров</a></li>
                                    <li><a href="/cart/">Корзина
                                            (<span id="cart-count"><?=Cart::countCartItems()?></span>)</a></li>
                                </ul>
                            </li>
                            <li><a href="/blog/">Блог</a></li>
                            <li><a href="/about/">О магазине</a></li>
                            <li><a href="/contact/">Контакты</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->

</header><!--/header-->
