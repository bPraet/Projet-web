<?php
    class Order{
        private $id;
        private $idUser;
        private $idStatus;
        private $total;
        private $date;
        private $adress;

        public static function add($idUser, $total, $adress){
            $db = db::connect();
            $query = $db->prepare("INSERT INTO orders (idUser, idStatus, total, date, adress) VALUES (:idUser,2,:total,CURDATE(),:adress)");
            $query->bindvalue(':idUser', $idUser);
            $query->bindvalue(':total', $total);
            $query->bindvalue(':adress', $adress);
            $query->execute();
            $query->closeCursor();
            return $db->lastInsertId();
        }

        public static function save($idOrder, $idProduct, $price){
            $db = db::connect();
            $query = $db->prepare("INSERT INTO orderedProducts (idOrder, idProduct, price) VALUES (:idOrder, :idProduct, :price)");
            $query->bindvalue(':idOrder', $idOrder);
            $query->bindvalue(':idProduct', $idProduct);
            $query->bindvalue(':price', $price);
            $query->execute();
            $query->closeCursor();
        }

        public static function paid($id){
            $db = db::connect();
            $query = $db->prepare("UPDATE orders SET idStatus = 1 WHERE id = :id");
            $query->bindvalue(':id', $id);
            $query->execute();
            $query->closeCursor();
        }

        public static function getAll(){
            $db = db::connect();
            $query = $db->prepare('SELECT * FROM orders');
            $query->execute();
            $orders = $query->fetchAll();
            $query->closeCursor();
            return $orders;
        }

        public static function getAllUser($id){
            $db = db::connect();
            $query = $db->prepare('SELECT * FROM orders WHERE idUser = :id');
            $query->bindvalue(':id', $id);
            $query->execute();
            $orders = $query->fetchAll();
            $query->closeCursor();
            return $orders;
        }

        public static function getCurrentYearOrders(){
            $db = db::connect();
            $query = $db->prepare('SELECT MONTH(date) AS mois,COUNT(id) AS nb FROM orders WHERE YEAR(date) = YEAR(CURDATE()) GROUP BY MONTH(date)');
            $query->execute();
            $orders = $query->fetchAll();
            $query->closeCursor();
            return $orders;
        }

        public static function getStatus($idStatus){
            $db = db::connect();
            $query = $db->prepare('SELECT name FROM orderStatus WHERE id = :id');
            $query->bindvalue(':id', $idStatus);
            $query->execute();
            $orders = $query->fetch();
            $query->closeCursor();
            return $orders;
        }

        public function get($value){
            return $this->$value;
        }

        public function set($var, $value){
            $this->$var = $value;
        }
    }

?>