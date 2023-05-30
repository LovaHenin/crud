
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>CRUDt</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.3/lux/bootstrap.min.css" integrity="sha512-+TCHrZDlJaieLxYGAxpR5QgMae/jFXNkrc6sxxYsIVuo/28nknKtf9Qv+J2PqqPXj0vtZo9AKW/SMWXe8i/o6w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">

                <!-- Lien vers la page index.php -->
                <a class="navbar-brand" href="<?=BASE_PATH; ?>">CRUD</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Home
                                <span class="visually-hidden">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASE_PATH. '/Exo'; ?>">Exo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=  BASE_PATH.'exo/annonce.php'; ?>">Ajout Annonce</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=  BASE_PATH.'exo/voirAnnonce.php'; ?>">Voir Anonce</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Admin</a>
                            <div class="dropdown-menu">

                            <!-- Lien vers userList-->
                                <a class="dropdown-item" href="<?= BASE_PATH. '/back/userList.php'; ?>">Gestion utilisateur</a>

                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </li>
                    </ul>
                        <!-- Lien vers login et register -->
                    <a href="<?=  BASE_PATH.'security/login.php'; ?>" class="btn btn-primary">Connexion</a>
                    <a href="<?=  BASE_PATH.'security/register.php'; ?>" class="btn btn-success">Inscription</a>
                </div>
            </div>
        </nav>
    </header>
    <main class="container">

    <?php 
    if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])):

    foreach ($_SESSION['messages'] as $type => $messages): 
        foreach ($messages as $key => $message):  // la deuxieme partie [succes] ?>
        
            <div class="alert alert-<?= $type;?> text-center w-50 mx-auto">
        

            <p><?=$message; ?></p></div>


    <?php
    unset($_SESSION['messages'][$type][$key]);// suppression messages
endforeach; endforeach;endif;
       
    
    // verification avec debug
  //  debug($_SESSION); debug(($_SESSION['messages']));debug(($_SESSION['messages']['succes'])); die('coucou');
    ?>
        