<?php
use Adam\BoutiqueNws\Controller\CommandController;
use Adam\BoutiqueNws\Controller\Database;
$commands = new CommandController();
$database = new Database('BoutiqueSC');
$status = [];
$statement = $database->table('statusCommande')->get([])->do();
while ($line = $statement->fetch(PDO::FETCH_ASSOC)) {
    $status[$line['id']] = $line['name'];
}

$command = $commands->getCommandById($_GET['id']);

$labels = ['Statu'];
$inputs = [
    ['id'=>'status','name'=>'status','type'=>'select','placeholder'=>'','required'=>false,'option'=>$status,'value'=>$command['status_id']],
];

fromTool('formulaire');

buildForm('Modifier le statu',$labels, $inputs,"Envoyer",'POST','#');
if(isset($_POST['submit'])){
    if($commands->updateCommand($_POST['status'])){
        header('Location: ./?page=adminMod&layout=html&adminMod=commands');
        exit;
    }
}
?>