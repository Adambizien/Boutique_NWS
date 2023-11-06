<?php
use Adam\BoutiqueNws\Controller\CommandController;
use Adam\BoutiqueNws\Controller\ProductController;
use Adam\BoutiqueNws\Controller\UserController;
$commandsController = new CommandController();
$userController = new UserController();
$productController = new ProductController();
$commands = $commandsController->getAllCommand();
$columns = ['Id Commande','Nom utilisateur', 'Email', 'Id Produit', 'Produit','Status','Date', 'Action'];
$table = [];
$data = [];
foreach($commands as $command){
    $user = $userController->getUserById($command['user_id']);
    $product = $productController->getProductById($command['product_id']);
    $status = $commandsController->getStatusById($command['status_id']);
    $data[] = [
        'Id Commande' => $command['id'],
        'Nom utilisateur' => $user['lastname'].' '.$user['name'],
        'Email' => $user['email'],
        'Id Produit' => $command['product_id'],
        'Produit' => $product['name'],
        'Status' => $status['name'],
        'Date' => $command['date'],
        'action'=> true,
        'actionBoutton'=>
        [
            ['url'=>'./?page=adminMod&layout=html&adminMod=statusCommand&id='.$command['id'],'icon'=>'bi bi-pencil-square'],
            ['url'=>'./?page=commandDetails&layout=html&id='.$command['id'],'icon'=>'bi bi-eye'],
        ],
    ];
}
fromTool('table');
generateTable($data, $columns);