<?php


class News{



    public static function getNewsItemsById($id)
    {
        $id = intval($id);
        if ($id) {

            $result = DB::getConnectionDB()->query("SELECT ID, title, date, short_content 
                        FROM publication
                        WHERE ID = $id");

            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }else{
            return false;
        }
    }


    public static function getNewsList(){


        $result = DB::getConnectionDB()->query("SELECT ID, title, date, short_content 
                    FROM publication
                    ORDER BY date DESC
                    LIMIT 10");

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $newsList = array();

        while ($row = $result->fetch()){
            $newsList[] = $row;
        }

        return $newsList;
    }
}