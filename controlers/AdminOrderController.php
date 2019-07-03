<?php


class AdminOrderController extends AdminBase {


    /**
     * @return bool
     */
    public function actionIndex(){

        self::checkAdmin();

        $orderList = Order::getOrderList();

        include_once (ROOT . '\views\admin\admin_order\index.php');

        return true;
    }

    /**
     * @return bool
     */
    public function actionAdd(){

        self::checkAdmin();

        echo "Add Order";

        if($_POST['submit']){

            /**
             * Do validation for category
             */

           /* if(!Order::addOrder($_POST)){
                die('Error add category to DB!');
            }*/

            //header("Location: ".SERVER_NAME."/admin/order");
        }else{

             include_once(ROOT . '\views\admin\admin_order\add.php');
        }
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionEdit($id)
    {

        self::checkAdmin();

        if ($_POST['submit']) {

            /**
             * Do validation for category
             */
            if(!Order::editOrder($_POST, $id)){
                die('Error edit order');
            }

            header('Location: ' . SERVER_NAME . '/admin/order');
        } else {

            $editOrder = Order::getOrderById($id);

            include_once(ROOT . '\views\admin\admin_order\edit.php');
        }

        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionDelete($id){

        self::checkAdmin();

        if(!Order::deleteOrder($id)){
            die("Error delete order!");
        }

        header('Location: ' . SERVER_NAME . '/admin/order');
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionView($id){

        self::checkAdmin();

        //Получение подробной информации о заказе по ID
        $orderView = Order::getOrderById($id);

        //Декодирование списка заказов
        $orderView['product'] = json_decode($orderView['product'],true);

        if($orderView['product']) {

            $productInCartDetail = Product::getProductArrayById(array_keys($orderView['product']));

            $totalPrice = Cart::getTotalPrice($productInCartDetail, $orderView['product']);

        }else{
            $productInCartDetail = array();
        }

        include_once (ROOT . '\views\admin\admin_order\view.php');

        return true;
    }

}