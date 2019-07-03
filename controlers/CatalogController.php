<?php


class CatalogController{

    public function actionIndex($page = 1){

        $categoryList = Category::getCategoryList();

        $lastProductList = Product::getProductList($page);

        $pagination = Pagination::setPagination(Product::SHOW_BY_DEFAULT, Product::getProductCount(), $page);

        include_once (ROOT. '\views\catalog\index.php');

        return true;
    }

    public function actionCategory($category, $page = 1){


        $categoryList = Category::getCategoryList();

        $productListByCategory = Product::getProductListByCategory($category, $page);


        $pagination = Pagination::setPagination(Product::SHOW_BY_DEFAULT, Product::getProductCountByCategory($category), $page);

        include_once (ROOT. '\views\catalog\category.php');

        return true;
    }
}