<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// require 'vendor/autoload.php';
// use Adam\BoutiqueNws\Controller\Database;
// echo "hello word";
// $db = new Database("php_framework" );

// var_dump($db->table('contacts')->post(['post' => [ "surname" => "tyr", "name" => "tr", "status" => 'online']])->getQuery());
// var_dump($db->table('contacts')->post(['post' => [ "surname" => "tyr", "name" => "tr", "status" => 'online']])->do());
// var_dump($db->table('contacts')->update(['post' => [ "surname" => "t"], "filters" => ['id' => "2"]])->getQuery());
// var_dump($db->table('contacts')->update(['post' => [ "surname" => "t"], "filters" => ['id' => "2"]])->do());



require_once './configs/bootstrap.php';
ob_start();

if(isset($_GET["page"]) ){
    if(frompage($_GET['page']) === false){
        header('Location: ./?page=accueil&layout=html');
    };
}else{
    header('Location: ./?page=accueil&layout=html');
    exit;
}

$pageContent = [
    "html" => ob_get_clean(),
];

if(isset($_GET["layout"])){
    include "./templates/layouts/". $_GET["layout"] .".layout.php";

}else{
    include "./templates/layouts/html.layout.php";
}


