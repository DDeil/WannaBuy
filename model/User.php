<?php

class User{

    public static function checkName($name){
        if(strlen($name) >= 3){
            return true;
        }
            return false;

    }


    public static function checkEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    public static function checkPhone($phone){
        if(strlen(intval($phone)) > 5){
            return true;
        }
        return false;
    }


    public static function checkPassword($password){
        if(strlen($password) >= 6){
            return true;
        }
        return false;
    }

    public static function checkExistEmail($email){

        $sql = "SELECT email FROM user WHERE email = :email";

        $resultDB = DB::getConnectionDB()->prepare($sql);

        $resultDB->bindParam(':email', $email, PDO::PARAM_STR);
        $resultDB->execute();

        if($resultDB->fetchColumn()){
            return false;
        }
        return true;

    }

    public static function registerUser($email, $name, $password){

        $sql = "INSERT INTO `super_mag`.`user` (`id`, `name`, `email`, `password`) 
                VALUES (NULL, :name, :email, :password);";

        $resultDB = DB::getConnectionDB()->prepare($sql);

        $resultDB->bindParam(':name', $name, PDO::PARAM_STR);
        $resultDB->bindParam(':email', $email, PDO::PARAM_STR);
        $resultDB->bindParam(':password', $password, PDO::PARAM_STR);

        return $resultDB->execute();

    }

    public static function loginUser($email, $password){

        $sql = "SELECT * FROM user WHERE email = :email and password = :password";

        $resultDB = DB::getConnectionDB()->prepare($sql);

        $resultDB->bindParam(':email', $email, PDO::PARAM_STR);
        $resultDB->bindParam(':password', $password, PDO::PARAM_STR);
        $resultDB->execute();

        $user = $resultDB->fetch();

        if($user){
            return $user['id'];
        }
        return false;
    }

    public static function setAuthUser($id){

        $_SESSION['user'] = $id;

    }

    public static function getAuthUser(){

        if(isset($_SESSION['user']))
            return $_SESSION['user'];

        return false;
    }

    public static function getAuthUserInfo(){

        $id = intval(self::getAuthUser());

        if($id){
            $resultDB = DB::getConnectionDB()->prepare("SELECT * FROM user WHERE id = :id");

            $resultDB->bindParam(':id', $id, PDO::PARAM_INT);
            $resultDB->execute();
            $resultDB->setFetchMode(PDO::FETCH_ASSOC);

            return $resultDB->fetch();
        }
        return false;
    }
}