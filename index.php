<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// require 'vendor/autoload.php';//c'est important pour que les use fonctionnent
// use Adam\BoutiqueNws\Controller\Database;
// echo "hello word";
// $db = new Database("php_framework" );

// var_dump($db->table('contacts')->post(['post' => [ "surname" => "tyr", "name" => "tr", "status" => 'online']])->getQuery());
// var_dump($db->table('contacts')->post(['post' => [ "surname" => "tyr", "name" => "tr", "status" => 'online']])->do());
// var_dump($db->table('contacts')->update(['post' => [ "surname" => "t"], "filters" => ['id' => "2"]])->getQuery());
// var_dump($db->table('contacts')->update(['post' => [ "surname" => "t"], "filters" => ['id' => "2"]])->do());

require 'vendor/autoload.php';
require_once './configs/bootstrap.php';
session_start();
ob_start();

$argumentGet = ["page", "layout","product","id","category"];

if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 999) {
    $argumentGet[] = "adminMod";
    $argumentGet[] = "id";
}
$extraKeys = array_diff(array_keys($_GET), $argumentGet);
if (!empty($extraKeys)) {
    header('Location: ./?page=accueil&layout=html');
    exit;
}
if(isset($_GET["page"]) ){
    if(frompage($_GET['page']) === false){
        header('Location: ./?page=accueil&layout=html');
        exit;
    };
}else{
    header('Location: ./?page=accueil&layout=html');
    exit;
}

if(isset($_GET["adminMod"]) ){
    if( $_GET["page"] !== 'adminMod' || fromAdminMod($_GET['adminMod']) === false){
        header('Location: ./?page=accueil&layout=html');
        exit;
    };
}





$pageContent = [
    "html" => ob_get_clean(),
];

if(isset($_GET["layout"])){
    include "./templates/layouts/". $_GET["layout"] .".layout.php";

}else{
    include "./templates/layouts/html.layout.php";
}


