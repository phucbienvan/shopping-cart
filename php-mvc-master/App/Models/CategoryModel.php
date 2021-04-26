<?php
namespace App\Models;


use Core;
use PDO;

class CategoryModel extends \Core\Model{
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM categories');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //them danh muc san pham
    public static function create($name, $description, $image){
        $db = static::getDB();
        $query = "INSERT INTO categories(name, description, image) VALUES(:name, :description, :image)";
        $stmt = $db->prepare($query);
        $stmt->bindParam('name', $name, PDO::PARAM_STR);
        $stmt->bindParam('description', $description, PDO::PARAM_STR);
        $stmt->bindParam('image', $image, PDO::PARAM_STR);

        return $stmt->execute();
    }

    //Xoa danh muc san pham
    public static function delete($id){
        $db =static::getDB();
        $query = "DELETE FROM categories WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

//    cap nhat san pham
    public static function update($id, $name, $description, $image){
        $db= static::getDB();
        $query = "UPDATE categories SET name =:name, description=:description, image=:image WHERE id=:id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);

        return $stmt->execute();
    }

//    lay danh muc san pham theo id
    public static function getCategoryById($id){
        $db= static::getDB();
        $query = "SELECT * FROM categories WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt ->execute();
        return $stmt->fetch();
    }
}