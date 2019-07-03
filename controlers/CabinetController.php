<?php


class CabinetController{
    public function actionIndex(){

        if(User::getAuthUser()) {

            include_once(ROOT . '\views\cabinet\index.php');
        }else{

            header("Location: /user/login/");
        }

        return true;
    }
}