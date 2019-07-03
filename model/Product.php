<?php


class Product{

    const SHOW_BY_DEFAULT = 6;

    public static function getProductList($page = 1)
    {

        $page = intval($page);

        $page--;

        if ($page >= 0) {

            $resultDB = DB::getConnectionDB()->prepare("SELECT id, name, code, price, is_new 
                                                      FROM product
                                                      WHERE status = '1'
                                                      ORDER BY id DESC 
                                                      LIMIT :lim
                                                      OFFSET :ofset");

            $resultDB->bindParam(":lim", intval(self::SHOW_BY_DEFAULT), PDO::PARAM_INT);
            $resultDB->bindParam(":ofset", intval($page * self::SHOW_BY_DEFAULT), PDO::PARAM_INT);

            $resultDB->execute();

        }else{
            $resultDB = DB::getConnectionDB()->query("SELECT id, code, name, price, is_new 
                                                      FROM product
                                                      ORDER BY id DESC");
        }

        $resultDB->setFetchMode(PDO::FETCH_ASSOC);

        $productList = array();

        while($productItem = $resultDB->fetch()){
            $productList[] = $productItem;
        }

        return $productList;
    }

    /**
     * @param int $count
     * @param $category
     * @return array
     */

    public static function getProductListByCategory( $category ="", $page = 1, $count = self::SHOW_BY_DEFAULT){

        $page = intval($page);
        $count = intval($count);
        $page--;

        $offset = $count * $page;

        $resultDB = DB::getConnectionDB()->prepare("SELECT product.id, product.name, product.price, product.is_new
                                                  FROM product, category
                                                  WHERE product.status = '1' and category.path = :category and product.category_id = category.id
                                                  ORDER BY id DESC 
                                                  LIMIT :count
                                                  OFFSET :offset");

        $resultDB->bindParam(":category", $category, PDO::PARAM_INT );
        $resultDB->bindParam(":count", $count, PDO::PARAM_INT );
        $resultDB->bindParam(":offset", $offset, PDO::PARAM_INT );

        $resultDB->execute();

        $resultDB->setFetchMode(PDO::FETCH_ASSOC);

        $productList = array();

        while($productItem = $resultDB->fetch()){
            $productList[] = $productItem;
        }

        return $productList;
    }

    /**
     * @param string $category
     * @param int $page
     * @param int $count
     * @return array
     */
    public static function getProductCountByCategory( $category =""){

        $resultDB = DB::getConnectionDB()->query("SELECT COUNT(*)as cnt 
                                                FROM `product`, category 
                                                WHERE category.path = '$category' 
                                                and category.id = product.`category_id`
                                                and product.status = '1'");

        $returnResult = $resultDB->fetch();
        return intval($returnResult['cnt']);
    }

    /**
     * @param string $category
     * @param int $page
     * @param int $count
     * @return array
     */
    public static function getProductCount(){

        $resultDB = DB::getConnectionDB()->query("SELECT COUNT(*)as cnt 
                                                FROM `product`, category 
                                                WHERE category.id = product.`category_id`
                                                and product.status = '1'");

        $returnResult = $resultDB->fetch();
        return intval($returnResult['cnt']);
    }
    /**
     * @param $id
     * @return bool
     */
    public static function getProductItems($id){
        $id = intval($id);

        if($id){

            $resultDB = DB::getConnectionDB()->query("SELECT * FROM product WHERE id ='$id'");

            $resultDB->setFetchMode(PDO::FETCH_ASSOC);

            $fetchResult = $resultDB->fetch();

            foreach ($fetchResult as $arrayId => $row){
                $fetchResult[$arrayId] = htmlspecialchars($row);
            }
            return $fetchResult;
        }
        return false;


    }

    /**
     *
     */
    public static function getRecommendedItems(){

        $resultDB = DB::getConnectionDB()->query("SELECT * FROM product WHERE is_recommended = 1");

        $resultDB->setFetchMode(PDO::FETCH_ASSOC);

        $recommendedList = array();
        while ($recommendedItem =  $resultDB->fetch()){
            $recommendedList[] = $recommendedItem;
        }
        return $recommendedList;
    }

    /**
     *
     */

    public static function getProductArrayById($idArray){

        $products = array();

        $idString = implode(",", $idArray);

        $resultDB = DB::getConnectionDB()->query("SELECT * FROM product WHERE id IN ($idString)");

        $resultDB->setFetchMode(PDO::FETCH_ASSOC);

        while($row = $resultDB->fetch()){
            $products[] = $row;
        }

        return $products;

    }

    /**
     * @param $product
     * @return mixed
     */
    public static function addProduct($product){
        $db = DB::getConnectionDB();
        $resultDB = $db->prepare("INSERT INTO `product`(`name`, `category_id`, `code`, `price`, `availability`, `description`, `is_new`, `is_recommended`, `status`)
                                                     VALUES(:name, :category, :code, :price, :availability, :description,:new, :recommended, :status );");

        $resultDB->bindParam(':name',$product['name'], PDO::PARAM_STR);
        $resultDB->bindParam(':category',$product['category'], PDO::PARAM_INT);
        $resultDB->bindParam(':code',$product['code'], PDO::PARAM_INT);
        $resultDB->bindParam(':price',$product['price'], PDO::PARAM_INT);
        $resultDB->bindParam(':availability',$product['availability'], PDO::PARAM_INT);
        $resultDB->bindParam(':description',$product['description'], PDO::PARAM_STR);
        $resultDB->bindParam(':new',$product['is_new'], PDO::PARAM_INT);
        $resultDB->bindParam(':recommended',$product['is_recommended'], PDO::PARAM_INT);
        $resultDB->bindParam(':status',$product['status'], PDO::PARAM_INT);

        $returnResult = $resultDB->execute();

        if($returnResult) {
            return $db->lastInsertId();
        }
        return false;

    }

    /**
     * @param $id
     * @return mixed
     */
    public static function deleteProduct($id){
        $id = intval($id);

        $resultDB = DB::getConnectionDB()->prepare("DELETE FROM product WHERE id = :id");

        $resultDB->bindParam(':id', $id, PDO::PARAM_INT);

        return $resultDB->execute();

    }

    /**
     * @param $product
     * @return mixed
     */
    public static function editProduct($product, $id){

        $id = intval($id);

        $resultDB = DB::getConnectionDB()->prepare("UPDATE `product` 
              SET `name` = :name, `category_id` = :category, `code` = :code, `price` = :price, `availability` = :availability, 
              `description` = :description, `is_new` = :new, `is_recommended` = :recommended, `status` = :status
              WHERE id = :id;");

        $resultDB->bindParam(':name',$product['name'], PDO::PARAM_STR);
        $resultDB->bindParam(':category',$product['category'], PDO::PARAM_INT);
        $resultDB->bindParam(':code',$product['code'], PDO::PARAM_INT);
        $resultDB->bindParam(':price',$product['price'], PDO::PARAM_INT);
        $resultDB->bindParam(':availability',$product['availability'], PDO::PARAM_INT);
        $resultDB->bindParam(':description',$product['description'], PDO::PARAM_STR);
        $resultDB->bindParam(':new',$product['is_new'], PDO::PARAM_INT);
        $resultDB->bindParam(':recommended',$product['is_recommended'], PDO::PARAM_INT);
        $resultDB->bindParam(':status',$product['status'], PDO::PARAM_INT);
        $resultDB->bindParam(':id',$id, PDO::PARAM_INT);

        return $resultDB->execute();
    }

    public static function getImagesPatch($id){

        $id = intval($id);

        $path =  '/template/images/product/' . $id . '.jpg';

        if(file_exists($_SERVER['DOCUMENT_ROOT'] . $path)){

            return SERVER_NAME . $path;
        }else{
            return SERVER_NAME . '/template\images\product\no_photo.jpg';
        }
        
        
    }
}