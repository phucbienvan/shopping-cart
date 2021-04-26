<?php
namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\User;
use App\Models\Admin;
use \Core\View;

class AdminCategoryController extends \Core\Controller{

    public function viewAction() {
        //kiem tra quyen admin
        Admin::checkAdmin();

        $categories = CategoryModel::getAll();
        View::render('admin/catlist.php', ['categories' => $categories]);
    }

    //them danh muc san pham
    public function addAction(){
        //kiem tra quyen admin
        Admin::checkAdmin();
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $image = $_POST['image'];
            CategoryModel::create($name, $description, $image);
            header("Location:/admin/catlist");
        }else{
            View::render('admin/catadd.php');
        }
    }

//    cap nhat danh muc san pham
    public function updateAction(){
        //kiem tra quyen admin
        Admin::checkAdmin();

        $id= $this->route_params['id'];
        $category = CategoryModel::getCategoryById($id);
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $image = $_POST['image'];
            CategoryModel::update($id, $name, $description, $image);

//            var_dump($name);
//            die();
            header("Location:/admin/catlist");
        }else{
            View::render('admin/catadd.php', ['category' => $category]);
        }
    }

    //xoa danh muc san pham
    public function deleteAction(){
        $id= $this->route_params['id'];
        CategoryModel::delete($id);
        header("Location: /admin/catlist");

    }

}