<?php
    class inbox{
        public static function getMessages(){
            $db = db::connect();
            $query = $db->prepare('SELECT * FROM contact');
            $query->execute();
            $inbox = $query->fetchAll();
            $query->closeCursor();
            return $inbox;
        }

        public static function rmMessage($id){
            $db = db::connect();
            $query = $db->prepare('DELETE FROM contact WHERE id = :id');
            $query->bindValue(':id', $id);
            $query->execute();
            $query->closeCursor();
        }
    }
?>