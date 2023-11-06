<?php
use Adam\BoutiqueNws\Controller\CategoryController;
$categorys = new CategoryController();
$labels = [ 'Catégorie'];
$inputs = [
    ['id'=>'category','name'=>'category','type'=>'text','placeholder'=>'Entrez la categorie','required'=>true],
];

fromTool('formulaire');
buildForm('Ajouter une categories',$labels, $inputs,"Envoyer",'POST','#');

if(isset($_POST['submit'])){
    if($categorys->createCategory($_POST['category'])){
        header('Location: ./?page=adminMod&layout=html&adminMod=category');
        exit;
    }
}
?>