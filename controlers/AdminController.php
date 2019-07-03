<?php

class AdminController extends AdminBase {

    public function actionIndex(){

        if(!self::checkAdmin()){
            header('Location:/');
            die("Access denied!");
        }



        include_once (ROOT . '\views\admin\admin.php');

        return true;
    }

}