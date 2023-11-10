<?php
use Adam\BoutiqueNws\Controller\ProductController;
$product = new ProductController();
if(isset($_GET['id'])){
    $status = $product->deleteProduct($_GET['id']);
    if($status){  
        dd('ok'); 
        header('Location: ./?page=adminMod&layout=html&adminMod=product');
        exit;
    }
}
?>