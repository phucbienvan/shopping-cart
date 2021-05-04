<?php
namespace App\Models;

use Core;
use PDO;

class ProductModel extends Core\Model {

//    in ra danh sách sản phẩm
    public static function getAll(){
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM products');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

//    tao ra 1 san pham moi
    public static function create($name, $id_type, $description, $unit_price, $image, $promotion_price, $unit){
        $db =static::getDB();
        $query = "INSERT INTO products(name, id_type, description, unit_price, image, promotion_price, unit) VALUES (:name, :id_type,
                :description, :unit_price, :image, :promotion_price, :unit)";
        $stmt = $db->prepare($query);
        $stmt->bindParam('name', $name, PDO::PARAM_STR);
        $stmt->bindParam('id_type', $id_type, PDO::PARAM_INT);
        $stmt->bindParam('description', $description, PDO::PARAM_STR);
        $stmt->bindParam('unit_price', $unit_price, PDO::PARAM_INT);
        $stmt->bindParam('image', $image, PDO::PARAM_STR);
        $stmt->bindParam('promotion_price', $promotion_price, PDO::PARAM_INT);
        $stmt->bindParam('unit', $unit, PDO::PARAM_STR);

        $stmt->execute();
        return $db->lastInsertId();
    }

//    xoa san pham theo id
    public static function delete($id){
        $db = static::getDB();
        $query = "DELETE FROM products WHERE id = :id";
        $stmt = $db ->prepare($query);
        $stmt->bindParam('id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    //    in ra danh sách sản phẩm theo danh mục category
    public static function getProductsListByCategory($id_type){
        $db = static::getDB();
        $query = "SELECT * FROM products WHERE id_type = :id_type ORDER BY id_type desc LIMIT 8";
        $stmt = $db ->prepare($query);
        $stmt->bindParam(':id_type', $id_type, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

//    lay san pham the id
    public static function getProductById($id){
//        neu id ton tai thi thuc hien
        if ($id){
            $db = static::getDB();
            $query = "SELECT id, name, id_type, description, unit_price, image, promotion_price FROM products WHERE id =:id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $stmt ->execute();
            return $stmt->fetch();
        }
    }

    //cap nhat san pham
    public static function update($id, $id_type, $name, $description, $unit_price, $image, $promotion_price, $unit){
        $db = static::getDB();
        $query = "UPDATE products SET name =:name , id_type =:id_type, description =:description, unit_price =:unit_price, image=:image, promotion_price=:promotion_price, unit =:unit WHERE id=:id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':id_type', $id_type, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':unit_price', $unit_price, PDO::PARAM_INT);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        $stmt->bindParam(':promotion_price', $promotion_price, PDO::PARAM_INT);
        $stmt->bindParam(':unit', $unit, PDO::PARAM_STR);

        return $stmt->execute();
    }

//    //lay hinh anh
//    public static function getImage(int $id){
//        $path = '/uploads';
//        $pathToProductImg = $path.$id. '.jpg';
//        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImg)){
//            return $pathToProductImg;
//        }else{
//
//        }
//    }



}