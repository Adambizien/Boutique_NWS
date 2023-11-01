  <!--<div class="container">
  <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a href="./?page=accueil&layout=html" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <image xlink:href="./image/NWS.png" width="40" height="32" />
                </svg>
                <span class="navbar-brand ">Annuaire NWS</span>
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="./?page=accueil&layout=html" class="nav-link <?php echo (isset( $_GET['page']) ? ($_GET['page'] == "accueil" ? "active" : "") : "active"); ?>" aria-current="page">Accueil</a></li>
                <li class="nav-item"><a href="./?page=formajout&layout=html" class="nav-link <?php echo (isset( $_GET['page']) && $_GET['page'] == "ajouter") ? "active" : ""; ?>">Ajouter</a></li>
            </ul>
        </nav>
    </header>
  </div>-->

<header class="p-2 mb-3 border-bottom bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="./?page=accueil&layout=html" class="d-flex align-items-center m-1  link-light text-decoration-none">
                <span class="navbar-brand ">SC SHOP</span>
            </a>

            <!--<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 ">
            <li><a href="./?page=accueil&layout=html" class="nav-link px-2 link-light">Accueil</a></li>
            </ul>-->
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li>
                    <a href="./?page=accueil&layout=html" class="nav-link px-2 link-<?php echo isset($_GET['page']) && $_GET['page']==='accueil'? 'primary' :'light'; ?>">Accueil</a>
                </li>
                <li>
                    <div class="dropdown p-2" id="dropdownCategory" >
                        <a href="#" class="d-bloc text-decoration-none dropdown-toggle text-<?php echo isset($_GET['page']) && $_GET['page']==='Category'? 'primary' :'light'; ?> ">
                            Category
                        </a>
                        <ul class="dropdown-menu text-small" style="">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <?php if(isset($_GET['page']) && $_GET['page']==='accueil'): ?>
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>
            <?php endif; ?>

            <?php if(isset($_SESSION['user'])): ?>
                <div class="dropdown" id="dropdownProfils" >
                    <a href="#" class="d-block  text-decoration-none dropdown-toggle text-light">
                        <i class="bi bi-person-circle "></i>
                    </a>
                    <ul class="dropdown-menu text-small">
                        <!--<li><a class="dropdown-item" href="#">New project...</a></li>-->
                        <li class="text-center"><?php echo $_SESSION['user_lastname'].' '.$_SESSION['user_name'] ?></li>
                        <li><hr class="dropdown-divider"></li>
                        <!--<li><a class="dropdown-item" href="./?page=adminmod&layout=html">Profile</a></li>-->
                        <li><a class="dropdown-item" href="./?page=profil&layout=html">Profile</a></li>
                        <li><a class="dropdown-item" href="./?page=updateaddress&layout=html">Adresse</a></li>
                        <li><a class="dropdown-item" href="./?page=updatepassword&layout=html">Mot de passe</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="./?page=signout&layout=html">Déconnexion</a></li>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if(empty($_SESSION['user'])): ?>
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="./?page=login&layout=html" class="nav-link link-light <?php echo (isset( $_GET['page']) ? ($_GET['page'] == "login" ? "active" : "") : "active"); ?>" aria-current="page">Connexion</a></li>
                    <li class="nav-item"><a href="./?page=signup&layout=html" class="nav-link link-light <?php echo (isset( $_GET['page']) && $_GET['page'] == "signup") ? "active" : ""; ?>">Inscription</a></li>
                </ul>
            <?php endif; ?>
        
        
        
        </div>
    </div>
</header>
  