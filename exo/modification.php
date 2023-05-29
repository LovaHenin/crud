<?php require_once '../config/function.php';
require_once '../inc/header.inc.php';
//include "voirAnnonce.php";
?>
<?php
$id=$_GET["id"];

$annonce=execute("SELECT * FROM test1 WHERE id=:id", array(
    ':id'=>$id
))->fetch(PDO::FETCH_ASSOC);

//debug($annonce);


?>


<?php 
if (!empty($_POST)){

    $error = false; 

     // début de controle du formulaire
    if (empty($_POST['annonce'])) {
        $annonce= 'annonce obligatoire';
        $error = true;
    
    }


    if (empty($_POST['tel'])) {
        $annoncename = 'Telephone obligatoire';
        $error = true;
    } else {
        if (strlen($_POST['tel']) !=10 && !(is_numeric($_POST)) ) {
            $telephone = 'Le numero doit contenir 10 chiffres';
            $error = true;
        }
    }



    // $error = false;
    if (!$error) {
       
        $resultat=execute("UPDATE  test1 SET (tel=:tel) WHERE id=:id", array(
          
            ':tel' => $_POST['tel'],
            ':id'=> $_POST['id']

        ));
        
       debug($resultat);
       die();
    }


    } //fin !empty($_Post)






?>


<form class="mt-5 w-75 mx-auto" method="POST" enctype="multipart/form-data">

    <div class="mb-3">
        <label for="annonce" class="form-label">ANNONCE*</label>
        <textarea name="annonce" type="text" class="form-control"  cols="30" rows="10" id="annonce"><?= $annonce["annonce"]?>"/></textarea>

       
    </div>
    <input type="hidden" name="id" value="<?= $annonce["id"]?>"/>
      <div class="mb-3">
        <label for="tel" class="form-label">TEL*</label>
        <input name="tel" type="text" class="form-control" value="<?= $annonce["tel"]?>" id="tel">


    </div>
 

  
    <button type="submit" class="btn btn-primary">MODIFIER</button>
</form>

















<?php require_once '../inc/footer.inc.php';          ?>