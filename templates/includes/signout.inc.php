<?php 
use Adam\BoutiqueNws\Controller\SignoutController;
if(!isset($_SESSION['user'])) {
    header("Location: ./?page=accueil&layout=html");
    exit();
}
$signout = new SignoutController();
$signout->signout();