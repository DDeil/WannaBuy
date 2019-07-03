<?php

class CartController{

    public function actionIndex($id=0){


        Cart::addProduct($id);

        header("Location: ". $_SERVER['HTTP_REFERER']);

        return true;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function actionAdd($id=0){


        Cart::addProduct($id);

        echo Cart::countCartItems();

        return true;
    }

    public function actionDelete($id){

        Cart::deleteProduct($id);

        header("Location: ". $_SERVER['HTTP_REFERER']);

        return true;

    }

    /**
     * @return bool
     */
    public function actionCart(){

        $categoryList = Category::getCategoryList();

        $cartProduct = Cart::getCartProduct();



        if($cartProduct){

            $productId = array_keys($cartProduct);

            $productsInCart = true;

            $products = Product::getProductArrayById($productId);

            $totalPrice = Cart::getTotalPrice($products);

        }

        include_once (ROOT . '\views\cart\cart.php');
        return true;
    }

    /**
     *
     */
    public function actionCheckOut(){

        $categoryList = Category::getCategoryList();


        $result = false;

        if(isset($_POST['submit'])){

            $user['name'] = $_POST['name'];
            $user['phone'] = $_POST['phone'];
            $user['email'] = $_POST['email'];

            $comment = $_POST['comment'];

            $error = false;

            if(!User::checkName($user['name'])){
                $error['name'] = "Слишком короткое имя!";
            }

            if(!User::checkPhone($user['phone'])){
                $error['phone'] = 'Указан неверный номер телефона!';
            }

            if(!User::checkEmail($user['email'])){
                $error['email'] = 'Некоректный E-mail!';
            }

            if(!$error){

                $result = Order::saveArray($user, $comment, User::getAuthUser(), Cart::getCartProduct());

                if($result){
                    Cart::destroyCart();
                }
            }
        }else{

            if(Cart::getCartProduct()){

                $productPrice = Cart::getTotalPrice( Product::getProductArrayById(array_keys(Cart::getCartProduct())));

                $countItemms = Cart::countCartItems();

                if(User::getAuthUser()){

                   $user = User::getAuthUserInfo();
                }
            }else{
                header("Location: /");
            }

        }

        include_once (ROOT . '\views\cart\check.php');

        return true;
    }
}