<?php

abstract class AdminBase{

    public function checkAdmin(){

        $user = User::getAuthUserInfo();

        if($user['rules'] == 'admin'){
            return true;
        }

        header('Location: /');
        die('Access denied!');
    }
}