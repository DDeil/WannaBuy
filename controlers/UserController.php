<?php

class UserController{

    public function actionRegister(){

        $name = '';
        $email = '';
        $password = '';
        $registrResult = false;

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $error = false;

            if(!User::checkName($name)){
                $error['name'] = 'Короткое или неправильное имя!';
            }

            if(!User::checkEmail($email)){
                $error['email'] = 'Некоректный E-mail!';
            }

            if(!User::checkPassword($password)){
                $error['password'] = 'Пароль должен иметь минимум 6 символов!';
            }

            if(!User::checkExistEmail($email)){
                $error['email'] = 'Пользователь с таким E-mail существует!';
            }

            if(!$error){

                $registrResult = User::registerUser($email, $name, $password);

            }
        }


        require_once (ROOT . '/views/user/register.php');

        return true;
    }

    public function actionLogin(){

        $email = '';
        $password = '';

        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $error = false;



            if(!User::checkEmail($email)){
                $error['email'] = 'Некоректный E-mail!';
            }

            if(!User::checkPassword($password)){
                $error['password'] = 'Пароль должен иметь минимум 6 символов!';
            }


            if(!$error){

               if($id = User::loginUser($email, $password)){

                   User::setAuthUser($id);

                   header("Location: /cabinet/");
               }else{
                   $error['email'] = 'Не известный пользователь!';
               }
            }
        }


        require_once (ROOT . '/views/user/login.php');

        return true;
    }

    public static function actionLogout(){

        User::setAuthUser(null);

        session_destroy();
        header("Location: ".SERVER_NAME);
    }
}