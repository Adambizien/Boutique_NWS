<?php 
    use Adam\BoutiqueNws\Controller\SignupController;
    if(isset($_POST['submit'])){
        $signup = new SignupController();
        if($signup->createUser($_POST['name'],$_POST['lastname'],$_POST['email'],$_POST['address'],$_POST['password'],$_POST['password2'])){
            header('Location: ./?page=login&layout=html');
            exit;
        }
    }
   