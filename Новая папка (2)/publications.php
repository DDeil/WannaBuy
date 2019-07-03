<?php

    require_once 'data.php';

/**
 *
 */
    foreach ($publication as $item){
        echo $item->printItem();
    }


    echo $_SERVER['REDIRECT_URL'];

    echo '<pre>';
    print_r( $_SERVER);
    echo '</pre>';