<?php
    class db{
        public static function connect(){
            try{
                include 'config.php';
                $db = new PDO($db_url, $db_login, $db_pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
            catch(Exception $e){
                echo 'Erreur: '.$e;
            }
            return $db;
        }
    }
    
?>