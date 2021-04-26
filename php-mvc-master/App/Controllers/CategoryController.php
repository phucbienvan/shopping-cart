<?php
namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use \Core\View;
class CategoryController  extends \Core\Controller {
    public function viewAction(){

        $id_type = 0;
//        for ($i= 1; $i< 100; $i++){
//            $i = $id_type;
//        }
        $categories = CategoryModel::getAll();

        View::render('Home/categories.php', ['categories' => $categories]);
        return true;
    }
    public function proCateAction(){
        $id_type= $this->route_params['id'];
        $categoryProducts = ProductModel::getProductsListByCategory($id_type);
        $category = CategoryModel::getCategoryById($id_type);
        View::render('Home/procate.php', compact("category", "categoryProducts"));

    }

}
