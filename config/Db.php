<?php 
require_once 'init.php';
// static function c'est pour pouvoir l'appeler sans instanciation de classe
class Db{

    public static function getDb()
    {
        try {

           return $pdo=new PDO('mysql:host='.CONFIG['db']['HOST'].';dbname='.CONFIG['db']['NAME'].';port='.CONFIG['db']['PORT'] ,
             CONFIG['db']['USER'] ,
             CONFIG['db']['PWD'],
               array( 
              //  PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING,
                PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'

            ) );
            
        }catch (Exception $e){

            var_dump($e);
            die();

        }





    }

}
?>