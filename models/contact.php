<?php
    class Contact{
        public static function send($name, $firstname, $email, $message){
            $db = db::connect();
            $query = $db->prepare("INSERT INTO contact (name, firstname, email, message) VALUES (?,?,?,?)");
            $query->execute(array($name, $firstname, $email, $message));
            $query->closeCursor();
        }
    }
?>