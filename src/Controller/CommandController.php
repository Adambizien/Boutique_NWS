<?php
namespace Adam\BoutiqueNws\Controller;

use Adam\BoutiqueNws\Controller\Database;
use PDO;

class CommandController {
    private $db;
    
    public function __construct() {
        $this->db = new Database('BoutiqueSC');
    }

    public function createCommand(int $user_id,int $product_id,int $status_id) {
        $date =$date = date("Y-m-d H:i");
        try {
            $this->db->table('commande')->post(['post' => ["date" => $date,"user_id"=>$user_id,"product_id"=>$product_id,"status_id"=>$status_id]])->do();
            return true;
        }catch(\Exception $e) {
            return false;
        }
    }
    public function updateCommand(int $status_id) {
        
        try {
            $this->db->table('commande')->update(['filters'=>['id'=>$_GET['id']],'post' => ["status_id"=>$status_id]])->do();
            return true;
        }catch(\Exception $e) {
            return false;
        }
    }
    public function getAllCommand(){
        $statement = $this->db->table('commande')->get([])->do();
        $Commands = [];
        while ($line = $statement->fetch(PDO::FETCH_ASSOC)) {
            $commands[] = $line;
        }
        return $commands;
    }
    public function getCommandById(int $id){
        $statement = $this->db->table('commande')->get(['filters'=>['id'=>$id]])->do();
        $command = $statement->fetch(PDO::FETCH_ASSOC);
        return $command;
    }
    public function getCommandByUser(int $user_id){
        $statement = $this->db->table('commande')->get(['filters'=>['user_id'=>$user_id]])->do();
        while ($line = $statement->fetch(PDO::FETCH_ASSOC)) {
            $command[] = $line;
        }
        return $command;
    }
    public function getStatusById(int $id){
        $statement = $this->db->table('statusCommande')->get(['filters'=>['id'=>$id]])->do();
        $status = $statement->fetch(PDO::FETCH_ASSOC);
        return $status;
    }
   
}