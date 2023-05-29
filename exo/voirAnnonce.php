<?php require_once '../config/function.php';
require_once '../inc/header.inc.php';

$annonces = execute("SELECT * FROM test1")->fetchAll(PDO::FETCH_ASSOC);
// debug($annonces);


?>


<table class="table table-dark table-striped">
    <thead>
        <tr>

            <th width="60px">ANNONCE</th>
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
                    <a href="?a=voir&i=<?= $annonce['id']; ?>" class="btn btn-info">VOIR </a>

                    <a href="?a=modif&i=<?= $annonce['id']; ?>" class="btn btn-info"> MODIFIER</a>
                    
                    <!-- mettre del dans $_GET[a] et id dans $GET[i]-->
                    <a href="?a=del&i=<?= $annonce['id']; ?>" class="btn btn-danger">SUPPRIMER</a>


                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>



<?php require_once '../inc/footer.inc.php';          ?>