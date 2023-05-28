<?php
require_once 'Db.php';

function debug($data)
{
   echo '<pre>';
   print_r($data);
   echo '</pre>';
}

function execute(string $requete, array $data = [], $lastId = null)
{
   // boucle pour echaapper les caracteres speciaux et supprimer les espaces en debut et fin de la chaine 
   foreach ($data as $marquer => $valeur) {
      // ici on réaffecte à notre tableau $data
      
// sécurité et à la prévention des attaques d'injection de code.
      $data[$marquer] = trim(htmlspecialchars($valeur));
   }
   $pdo = Db::getDb(); // connexion à la base de Db.php
   $resultat = $pdo->prepare($requete); // on prepare la requete envoyée avec marqueur
   $success = $resultat->execute($data); // boolean true si ok false sinon

   if ($success) { // si tout s'est bien passé (success renvoi true ou false)

      if ($lastId) { // si le paramètre optionnel $lastiD est renseigné
         return $pdo->lastInsertId(); // on renvoie le dernier id inséré
      } else { // sinon on renvoie le jeu de résultat
         return $resultat;
      }
   } else {
      return false;
   }
}

function password_strength_check($password, $min_len = 6, $max_len = 15, $req_digit = 1, $req_lower = 1, $req_upper = 1, $req_symbol = 1)
{
   // Build regex string depending on requirements for the password
   $regex = '/^';
   if ($req_digit == 1) {
      $regex .= '(?=.\d)';
   }              // Match at least 1 digit
   if ($req_lower == 1) {
      $regex .= '(?=.[a-z])';
   }           // Match at least 1 lowercase letter
   if ($req_upper == 1) {
      $regex .= '(?=.[A-Z])';
   }           // Match at least 1 uppercase letter
   if ($req_symbol == 1) {
      $regex .= '(?=.[^a-zA-Z\d])';
   }    // Match at least 1 character that is none of the above
   $regex .= '.{' . $min_len . ',' . $max_len . '}$/';

   if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/", $password)) {
      return TRUE;
   } else {
      return FALSE;
   }
}

