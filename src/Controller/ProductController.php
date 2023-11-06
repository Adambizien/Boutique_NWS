<?php
namespace Adam\BoutiqueNws\Controller;

use Adam\BoutiqueNws\Controller\Database;
use PDO;

class ProductController {
    private $db;
    
    public function __construct() {
        $this->db = new Database('BoutiqueSC');
    }

    public function createProduct(string $name,int $category,float $price,string $image,int $quantity,int $first,string $description = "") {
        $date =$date = date("Y-m-d H:i");
        try {
            $this->db->table('product')->post(['post' => ["name" => $name,"description" => $description,"price" => $price,"quantity" => $quantity,"image" => $image,"first" => $first,"date" => $date,"online" => true,"category_id"=>$category]])->do();
            return true;
        }catch(\Exception $e) {
            return false;
        }
    }
    public function updateProduct(string $name,int $category,float $price,string $image,int $quantity,int $first,string $description = "") {
        $date =$date = date("Y-m-d H:i");
        try {
            $this->db->table('product')->update(['post' => ["name" => $name,"description" => $description,"price" => $price,"quantity" => $quantity,"image" => $image,"first" => $first,"date" => $date,"online" => true,"category_id"=>$category],'filters'=>['id'=>$_GET['id']]])->do();
            return true;
        }catch(\Exception $e) {
            return false;
        }
    }
    public function updateProductQuantity(int $quantity) {
        try {
            $this->db->table('product')->update(['post' => ["quantity" => $quantity],'filters'=>['id'=>$_GET['id']]])->do();
            return true;
        }catch(\Exception $e) {
            return false;
        }
    }

    public function getAllProducts(){
        $statement = $this->db->table('product')->get([])->do();
        $products = [];
        while ($line = $statement->fetch(PDO::FETCH_ASSOC)) {
            $products[] = $line;
        }
        return $products;
    }
    public function getProductByFilters(array $filters){
        $statement = $this->db->table('product')->get(['filters'=>$filters])->do();
        $products = [];
        while ($line = $statement->fetch(PDO::FETCH_ASSOC)) {
            $products[] = $line;
        }
        return $products;
    }
    public function getCategoryById(int $id){
        $statement = $this->db->table('category')->get(['filters'=>['id'=>$id]])->do();
        $category = $statement->fetch(PDO::FETCH_ASSOC);
        return $category['name'];
    }
    public function getProductById(int $id){
        $statement = $this->db->table('product')->get(['filters'=>['id'=>$id]])->do();
        $product = $statement->fetch(PDO::FETCH_ASSOC);
        return $product;
    }
   
}