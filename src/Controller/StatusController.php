<?php
namespace Adam\BoutiqueNws\Controller;

use Adam\BoutiqueNws\Controller\Database;
use PDO;

class StatusController {
    private $db;
    
    public function __construct() {
        $this->db = new Database('BoutiqueSC');
    }
    public function getAllStatus(){
        $statement = $this->db->table('statusCommande')->get([])->do();
        $status = [];
        while ($line = $statement->fetch(PDO::FETCH_ASSOC)) {
            $status[] = $line;
        }
        return $status;
    }
    public function getStatusById(int $id){
        $statement = $this->db->table('statusCommande')->get(['filters'=>['id'=>$id]])->do();
        $status = $statement->fetch(PDO::FETCH_ASSOC);
        return $status;
    }
}