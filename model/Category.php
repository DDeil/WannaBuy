<?php


class Category{
    /**
     * @return array
     */
    public static function getCategoryList(){

        $resultDB = DB::getConnectionDB()->query("SELECT *
                                                  FROM category
                                                  ORDER BY sort_order ASC");

        $resultDB->setFetchMode(PDO::FETCH_ASSOC);

        $categoryList = array();

        while($row = $resultDB->fetch()){
            $categoryList[] = $row;
        }

        return $categoryList;
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getCategoryItemsById($id){

        $id = intval($id);

        $resultDB = DB::getConnectionDB()->prepare('SELECT * FROM category WHERE id = :id');

        $resultDB->bindParam(':id', $id, PDO::PARAM_INT);
        $resultDB->execute();

        $resultDB->setFetchMode(PDO::FETCH_ASSOC);

        return $resultDB->fetch();

    }

    /**
     * @param $category
     * @param $id
     * @return mixed
     */
    public static function editCategory($category, $id){
        $id = intval($id);

        $resultDB = DB::getConnectionDB()->prepare('UPDATE category 
                                                    SET name = :name,
                                                    path = :path,
                                                    sort_order = :sort_order,
                                                    status = :status
                                                    WHERE id = :id');

        $resultDB->bindParam(':name' , $category['name'] , PDO::PARAM_STR);
        $resultDB->bindParam(':path', $category['path'], PDO::PARAM_STR);
        $resultDB->bindParam(':sort_order', $category['sort_order'], PDO::PARAM_INT);
        $resultDB->bindParam(':status', $category['status'], PDO::PARAM_INT);
        $resultDB->bindParam(':id', $id, PDO::PARAM_INT);

        return $resultDB->execute();

    }

    /**
     * @param $category
     * @return mixed
     */
    public static function addCategory($category){

        $resultDB = DB::getConnectionDB()->prepare('INSERT INTO category(name, path, sort_order, status)
                                                    VALUES (:name, :path, :sort_order, :status)');

        $resultDB->bindParam(':name', $category['name'], PDO::PARAM_STR);
        $resultDB->bindParam(':path', $category['path'], PDO::PARAM_STR);
        $resultDB->bindParam(':sort_order', $category['sort_order'], PDO::PARAM_STR);
        $resultDB->bindParam(':status', $category['status'], PDO::PARAM_STR);

        return $resultDB->execute();
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function deleteCategory($id){

        $id = intval($id);

        $resultDB = DB::getConnectionDB()->prepare('DELETE FROM category WHERE id = :id');

        $resultDB->bindParam(':id', $id, PDO::PARAM_STR);

        return $resultDB->execute();
    }
}