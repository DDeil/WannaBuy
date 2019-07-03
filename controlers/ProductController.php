<?php


class ProductController{

    public function actionView($id){

        $categoryList = Category::getCategoryList();

        $productItem = Product::getProductItems($id);

        include_once (ROOT. '\views\product\view.php');

        return true;
    }
}