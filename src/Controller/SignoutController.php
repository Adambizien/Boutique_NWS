<?php
namespace Adam\BoutiqueNws\Controller;

class SignoutController {
    
    public function signout() {
        session_destroy();
        header("Location: ./?page=accueil&layout=html");
        exit();
    }
}
