<?php

class Cart{
    /**
     * @param $id
     * @param int $count
     */
    public static function addProduct($id, $count = 1){

        $id = intval($id);
        $count = intval($count);

        $cartArray = array();

        if(isset($_SESSION['product'])){

            $cartArray = $_SESSION['product'];
        }

        if(array_key_exists($id, $cartArray)){

            $cartArray[$id] += $count;
        }else{

            $cartArray[$id] = $count;
        }

        $_SESSION['product'] = $cartArray;

    }

    public static function deleteProduct($id){
        $id = intval($id);

        if(isset($_SESSION['product'])){
            $productCart = $_SESSION['product'];


            if($productCart[$id] > 1 ) {
                $productCart[$id]--;
            }else{
                unset($productCart[$id]);
            }

            $_SESSION['product'] = $productCart;
        }

    }

    /**
     * @return int
     */

    public static function countCartItems(){

        if(isset($_SESSION['product'])){

            $count = 0;
            foreach ($_SESSION['product'] as $id => $qauntiti){
                $count += $qauntiti;
            }
            return $count;
        }
        return 0;
    }

    /**
     * @return bool
     */

    public static function getCartProduct(){

        if(isset($_SESSION['product'])) {
            return $_SESSION['product'];
        }

        return false;
    }

    /**
     * @return bool
     */
    public static function getTotalPrice($arrayProductsDetail, $arrayCountProduct = null){

        if(!isset($arrayCountProduct)){
            $arrayCountProduct = self::getCartProduct();

            if(!$arrayCountProduct){
                return false;
            }
        }
        $totalPrice = 0;

        foreach ($arrayProductsDetail as $product){
            $totalPrice += $product['price'] * $arrayCountProduct[$product['id']];
        }
        return $totalPrice;
    }

    /**
     * @return bool
     */
    public static function destroyCart(){

        if(isset($_SESSION['product'])){

            unset ($_SESSION['product']);
            return true;
        }

        return false;
    }
}