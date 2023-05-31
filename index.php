<?php require_once 'config/function.php';
require_once 'inc/header.inc.php'; 

//session_destroy();
if (isset($_GET['a']) && $_GET['a']=='dis'){

    unset($_SESSION['user']);
    $_SESSION['messages']['info'][]='A bientôt !!';

    header('location:./'); // ca reste dans cette page et lancer index
    exit();
}

?>











<?php require_once 'inc/footer.inc.php'; ?>