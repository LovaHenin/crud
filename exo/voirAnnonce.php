<?php require_once '../config/function.php';
require_once '../inc/header.inc.php';

$annonces = execute("SELECT * FROM test1")->fetchAll(PDO::FETCH_ASSOC);
 //debug($annonces);

 if (isset($_GET['i'])){

    // gestion du voir
    if (isset($_GET['a']) && $_GET['a']=='voir'){
      
        ?>
        
      <div class="card">
  <h5 class="card-header">Tel : <?php echo ($_GET['tel']); ?></h5>
  <div class="card-body">
    <h5 class="card-title">Annonce</h5>
    <p class="card-text"> <?php echo ($_GET['annonce']);?></p>
    <a href="<?=  BASE_PATH.'exo/voirAnnonce.php'; ?>" class="btn btn-primary">Retour annonce</a>

  </div>
</div>
   <?php  
    }
  die;
    // mise en place de la suppression
    if (isset($_GET['a']) && $_GET['a']=='del'){
        execute("DELETE FROM test1 WHERE id=:id", array(
            ':id'=>$_GET['i']
        ));
        header('location:userList.php');
        exit;

    }

}

?>


<table class="table table-dark table-striped">
    <thead>
        <tr>

            <th>ANNONCE</th>
            <th>TEL</th>
            <th>ACTION</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($annonces as $annonce) :           ?>
            <tr>
               
                <td width="55%"><?= $annonce['annonce']; ?></td>
                <td ><?= $annonce['tel']; ?></td>
              
                <td>

                    <!-- mettre voir dans $_GET[a] et id dans $GET[i]-->
                    <a href="?a=voir&i=<?= $annonce['id']; ?>&tel=<?= $annonce['tel']; ?>&annonce=<?= $annonce['annonce']; ?>" class="btn btn-info">VOIR </a>

                    <a href="?a=modif&i=<?= $annonce['id']; ?>" class="btn btn-info"> MODIFIER</a>
                    
                    <!-- mettre del dans $_GET[a] et id dans $GET[i]-->
                    <a href="?a=del&i=<?= $annonce['id']; ?>" class="btn btn-danger">SUPPRIMER</a>


                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>



<?php require_once '../inc/footer.inc.php';          ?>