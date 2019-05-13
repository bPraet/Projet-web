<?php

    class Cart{
        private $id;
        private $idUser;
        private $idProduct;

        public static function add($idUser, $idProduct){
            $db = db::connect();
            $query = $db->prepare("INSERT INTO carts (idUser, idProduct) VALUES (?,?)");
            $query->execute(array($idUser, $idProduct));
            $query->closeCursor();
        }

        public static function rm($idUser, $idProduct){
            $db = db::connect();
            $query = $db->prepare("DELETE FROM carts WHERE (idUser = ? AND idProduct = ?) LIMIT 1");
            $query->execute(array($idUser, $idProduct));
            $query->closeCursor();
        }

        public static function rmAll($idUser){
            $db = db::connect();
            $query = $db->prepare("DELETE FROM carts WHERE (idUser = ?)");
            $query->execute(array($idUser));
            $query->closeCursor();
        }

        public static function getFromUserId($idUser){
            $db = db::connect();
            $query = $db->prepare("SELECT * FROM products AS p
                                INNER JOIN carts AS c ON p.id = c.idProduct
                                WHERE c.idUser = :id");
            $query->bindValue(':id', $idUser);
            $query->execute();
            $cart = $query->fetchAll();
            $query->closeCursor();
            return $cart;
        }

        public static function getTotal($idUser){
            $db = db::connect();
            $query = $db->prepare("SELECT SUM(price) AS total FROM products AS p
                                INNER JOIN carts AS c ON p.id = c.idProduct
                                WHERE c.idUser = :id");
            $query->bindValue(':id', $idUser);
            $query->execute();
            $cart = $query->fetch();
            $query->closeCursor();
            return $cart;
        }
    }

?>