<?php


class SiteController{

    public function __construct()
    {

    }

    public function actionIndex(){

        $categoryList = Category::getCategoryList();

        $lastProductList = Product::getProductList();

        $recommendedList = Product::getRecommendedItems();

        include_once (ROOT. '\views\site\index.php');

        return true;
    }


}