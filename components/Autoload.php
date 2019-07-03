<?php


function __autoload($classes_name){

    $components_folder = array(
      '/components/',
      '/model/'
    );

    foreach ($components_folder as $folder){
        $path = ROOT . $folder . $classes_name . '.php';
        if(is_file($path)){
            include_once ($path);
        }
    }

}