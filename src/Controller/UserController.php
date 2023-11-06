<?php
namespace Adam\BoutiqueNws\Controller;

use Adam\BoutiqueNws\Controller\Database;
use PDO;

class UserController {
    private $db;
    
    public function __construct() {
        $this->db = new Database('BoutiqueSC');
    }
    public function getUserById(int $id){
        $statement = $this->db->table('user')->get(['filters'=>['id'=>$id]])->do();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}