<?php

class AdminCategoryController extends AdminBase {

    /**
     * @return bool
     */
    public function actionIndex(){

        self::checkAdmin();

        $categoryList = Category::getCategoryList();

        include_once (ROOT . '\views\admin\admin_category\index.php');

        return true;
    }

    /**
     * @return bool
     */
    public function actionAdd(){

        self::checkAdmin();

        if($_POST['submit']){

            /**
             * Do validation for category
             */

            if(!Category::addCategory($_POST)){
                die('Error add category to DB!');
            }

            header("Location: ".SERVER_NAME."/admin/category");
        }else {

            include_once(ROOT . '\views\admin\admin_category\add.php');
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
            if(!Category::editCategory($_POST, $id)){
                die('Error edit category');
            }

            header('Location: ' . SERVER_NAME . '/admin/category');
        } else {

            $editCategoryItems = Category::getCategoryItemsById($id);

            include_once(ROOT . '\views\admin\admin_category\edit.php');
        }

        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function actionDelete($id){

        self::checkAdmin();

        Category::deleteCategory($id);

        header('Location: ' . SERVER_NAME . '/admin/category');
        return true;
    }

}