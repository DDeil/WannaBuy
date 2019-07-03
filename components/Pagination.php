<?php

class Pagination{

    const PRIV = 0;
    const NEXT = 1;
    const ACTIVE = 2;
    const PAGE = 3;


    protected static $leftCountPage = 2;
    protected static $rightCountPage = 2;

    /**
     * @param $leftCountPage
     */
    public static function setLeftCountPage($leftCountPage){
        self::$leftCountPage = $leftCountPage;
    }

    /**
     * @param $rightCountPage
     */
    public static function setRightCountPage($rightCountPage){
        self::$rightCountPage = $rightCountPage;
    }

    /**
     * @param $itemOnPage
     * @param $maxItem
     * @param int $page
     * @return array
     */
    public static function setPagination( $itemOnPage, $maxItem, $page = 1, $iLeft = 2, $iRight = 2)
    {
        $countPage = ceil($maxItem / $itemOnPage);

        $iLeft = intval($iLeft);
        $iRight = intval($iRight);

        $paginatioArray = array();

        /**
         * Проверка наличия стрелочки придедушая
         */
        if($page > 1){

            $paginatioArray[] = array(self::PRIV, $page-1);
        }

        /**
         * построение пагинации
         */
        if($page <= $iLeft){
            /**
             * Начало пагинации
             */
            $countVisiblePagination = $iLeft + $iRight + 1;

            for($i = 1 ; $i <= $countVisiblePagination && $i <= $countPage;$i++){
                if($i == $page){
                    $paginatioArray[] = array(self::ACTIVE, $i);
                }else{
                    $paginatioArray[] = array(self::PAGE, $i);
                }
            }

        }elseif ($page >= $countPage - $iRight){
            /**
             * конец пагинации
             */

            $countPage - ($iLeft + $iRight+1 ) < 1 ?
                $countVisiblePagination = 1 : $countVisiblePagination = $countPage - ($iLeft + $iRight );

            for($i = $countVisiblePagination ; $i <= $countPage ;$i++){
                if($i == $page){
                    $paginatioArray[] = array(self::ACTIVE, $i);
                }else{
                    $paginatioArray[] = array(self::PAGE, $i);
                }
            }
        }else{
            /**
             * середина пагинации
             */
            for($i = $page - $iLeft ; $i <= $page + $iRight ;$i++){
                if($i == $page){
                    $paginatioArray[] = array(self::ACTIVE, $i);
                }else{
                    $paginatioArray[] = array(self::PAGE, $i);
                }
            }
        }
        /**
         * Проверка наличия стрелочки следущая
         */
        if($page < $countPage){

            $paginatioArray[] = array(self::NEXT, $page + 1);
        }

        return $paginatioArray;
    }
}