<?php


class AdminProductController extends AdminBase{
    /**
     * @return bool
     */
    public function actionIndex(){

        self::checkAdmin();

        $productList = Product::getProductList(0);

        include_once (ROOT . '\views\admin\admin_product\index.php');

        return true;
    }

    /**
     * @return bool
     */
    public function actionAdd(){

        self::checkAdmin();

        if(!isset($_POST['submit'])){

            $categoryList = Category::getCategoryList();

            include_once (ROOT . '\views\admin\admin_product\add.php');

        }else{

            if( !$idNewProduct = Product::addProduct($_POST)){

                die("Error add new product ");
            }else {

                if(is_uploaded_file($_FILES['image']['tmp_name'])){

                    move_uploaded_file($_FILES['image']['tmp_name'],
                        $_SERVER['DOCUMENT_ROOT'] . '\template\images\product\\' . $idNewProduct.'.jpg');
                }
            }
            header("Location: ".SERVER_NAME."/admin/product");
        }

        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionDelete($id){

        self::checkAdmin();

        $id = intval($id);

        if(!Product::deleteProduct($id)){
            die("error");
        }

        header("Location: ".SERVER_NAME."/admin/product");

        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionEdit($id)
    {
        self::checkAdmin();

        $id = intval($id);

        if (isset($_POST['submit'])) {

            if( !Product::editProduct($_POST, $id)){

                die('Error edit product!');
            }else {

                if (is_uploaded_file($_FILES['image']['tmp_name'])) {

                    move_uploaded_file($_FILES['image']['tmp_name'],
                        $_SERVER['DOCUMENT_ROOT'] . '\template\images\product\\' . $id . '.jpg');
                }
            }

            header("Location: ".SERVER_NAME."/admin/product");

        } else {

            $categoryList = Category::getCategoryList();
            $editProduct = Product::getProductItems($id);

            include_once(ROOT . '\views\admin\admin_product/edit.php');
        }
        return true;
    }
}