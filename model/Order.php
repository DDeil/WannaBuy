<?php


class Order{
    /**
     * @param $user
     * @param $userComent
     * @param $userId
     * @param $productCart
     * @return mixed
     */

    public static function saveArray($user, $userComent, $userId, $productCart){

        $productCart = json_encode($productCart);

        $resultDB = DB::getConnectionDB()->prepare("
                          INSERT INTO product_order (user_name, user_phone, user_email, user_comment, user_id, product)
                          VALUES (:name, :phone, :email, :comment, :id, :product)");

        $resultDB->bindParam(':name', $user['name'], PDO::PARAM_STR);
        $resultDB->bindParam(':phone', $user['phone'], PDO::PARAM_INT);
        $resultDB->bindParam(':email', $user['email'], PDO::PARAM_STR);
        $resultDB->bindParam(':comment', $userComent, PDO::PARAM_STR);
        $resultDB->bindParam(':id', $userId, PDO::PARAM_STR);
        $resultDB->bindParam(':product', $productCart, PDO::PARAM_STR);

        return $resultDB->execute();

    }

    /**
     * @param $id
     * @return bool|string
     */
    public static function statusEncode($id){

        switch ($id){
            case 0:
                return  "Отменен";
                break;
            case 1:
                return "Новый";
                break;
            case 2:
                return "В оброботке";
                break;
            case 3:
                return "Выполнен";
                break;
        }

        return false;
    }

    /**
     * @return array
     */
    public static function getOrderList(){

        $resultDB = DB::getConnectionDB()->query('SELECT * FROM product_order ORDER BY id ASC');

        $resultDB->setFetchMode(PDO::FETCH_ASSOC);

        $orderArray = array();

        while ($row = $resultDB->fetch()){
            $orderArray[] = $row;
        }

        return $orderArray;
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getOrderById($id){

        $id = intval($id);

        $resultDB = DB::getConnectionDB()->prepare('SELECT * FROM product_order WHERE id = :id');

        $resultDB->bindParam(':id', $id, PDO::PARAM_INT);
        $resultDB->execute();
        $resultDB->setFetchMode(PDO::FETCH_ASSOC);

        return $resultDB->fetch();
    }

    /** EDIT Order
     * @param $order
     * @param $id
     * @return mixed
     */
    public static function editOrder($order, $id){

        $id = intval($id);

        $resultDB = DB::getConnectionDB()->prepare('UPDATE product_order
                                                    SET user_name = :name,
                                                    user_phone = :phone,
                                                    user_email = :email,
                                                    date = :date,
                                                    status = :status
                                                    WHERE id = :id');
        $resultDB->bindParam(':name', $order['name'], PDO::PARAM_STR);
        $resultDB->bindParam(':phone', $order['phone'], PDO::PARAM_INT);
        $resultDB->bindParam(':email', $order['email'], PDO::PARAM_STR);
        $resultDB->bindParam(':date', $order['date'], PDO::PARAM_INT);
        $resultDB->bindParam(':status', $order['status'], PDO::PARAM_INT);
        $resultDB->bindParam(':id', $id, PDO::PARAM_INT);

        return $resultDB->execute();
    }

    /**
     * @param $id
     * @return int
     *
     */
    public static function deleteOrder($id){
        $id = intval($id);

        $resultDB = DB::getConnectionDB()->prepare('DELETE FROM product_order WHERE id = :id');

        $resultDB->bindParam(":id", $id, PDO::PARAM_INT);

        return $resultDB->execute();
    }

    /**
     * @param $order
     */
    public static function addOrder($order){

        $resultDB = DB::getConnectionDB()->prepare('INSERT INTO product_order() VALUES ()');

    }
}