<?php require_once '../config/function.php';
require_once '../inc/header.inc.php';

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
       
        $resultat=execute("INSERT INTO test1 (annonce,tel) VALUES (:annonce,:tel)", array(
            ':annonce' => $_POST['annonce'],
            ':tel' => $_POST['tel']
          

        ),'ggg');
        
       // debug($resultat);
       // die();
    }


    } //fin !empty($_Post)


?>



<form class="mt-5 w-75 mx-auto" method="post" enctype="multipart/form-data">

    <div class="mb-3">
        <label for="annonce" class="form-label">ANNONCE*</label>
        <textarea name="annonce" type="text" class="form-control"  cols="30" rows="10" id="annonce"></textarea>

        <small class="text-danger"><?= $annonce?? ""; ?></small>

    </div>
    
      <div class="mb-3">
        <label for="tel" class="form-label">TEL*</label>
        <input name="tel" type="text" class="form-control" id="pseudo">

        <small class="text-danger"><?= $telephone ?? ""; ?></small>

    </div>
 

  
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
<?php require_once '../inc/footer.inc.php'; ?>