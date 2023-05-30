<?php require_once '../config/function.php';
require_once '../inc/header.inc.php';

$annonces = execute("SELECT * FROM test1")->fetchAll(PDO::FETCH_ASSOC);
//debug($annonces);

if (isset($_GET['i'])) {

    // gestion du voir
    if (isset($_GET['a']) && $_GET['a'] == 'voir') {
        $annonce=execute("SELECT * FROM test1 WHERE id=:id", array(
            ':id'=>$_GET['i']
    ))->fetch(PDO::FETCH_ASSOC);

  //  var_dump($annonce);
?>
       
        <div class="card">
            <h5 class="card-header">Tel : <?php echo ($annonce['tel']); ?></h5>
            <div class="card-body">
                <h5 class="card-title">Annonce</h5>
                <p class="card-text"> <?php echo ($annonce['annonce']); ?></p>
                <a href="<?= BASE_PATH . 'exo/voirAnnonce.php'; ?>" class="btn btn-primary">Retour annonce</a>

            </div>
        </div>
<?php
    }
   
    ?>
    // mise en place de la suppression


<?php
    // mise en place de la suppression
    if (isset($_GET['a']) && $_GET['a'] == 'del') {
        execute("DELETE FROM test1 WHERE id=:id", array(
            ':id' => $_GET['i']
        ));
        header('location:voirAnnonce.php');
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
                <td><?= $annonce['tel']; ?></td>

                <td>

                    <!-- mettre voir dans $_GET[a] et id dans $GET[i]-->
                    <a href="?a=voir&i=<?= $annonce['id']; ?>" class="btn btn-info">VOIR </a>




                    <form action="modification.php" method="GET">
                        <input type="hidden" name="id" value="<?=$annonce["id"]; ?>" />
                        <input class="btn btn-danger" type="submit" value="MODIFIER" />
                    </form>

                    <!-- mettre del dans $_GET[a] et id dans $GET[i]-->
                    <a href="?a=del&i=<?= $annonce['id']; ?>" class="btn btn-danger">SUPPRIMER</a>


                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>



<?php require_once '../inc/footer.inc.php';          ?>