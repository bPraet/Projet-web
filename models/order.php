<?php
    class Order{
        private $id;
        private $idUser;
        private $idStatus;
        private $total;
        private $date;
        private $adress;
        private $transactionId;

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

        public static function getOrder($id){
            $db = db::connect();
            $query = $db->prepare('SELECT * FROM orders WHERE id = :id');
            $query->bindvalue(':id', $id);
            $query->execute();
            $order = $query->fetchAll();
            $query->closeCursor();
            return $order;
        }

        public static function getCurrentYearOrders(){
            $db = db::connect();
            $query = $db->prepare('SELECT MONTH(date) AS mois,COUNT(id) AS nb FROM orders WHERE YEAR(date) = YEAR(CURDATE()) GROUP BY MONTH(date)');
            $query->execute();
            $orders = $query->fetchAll();
            $query->closeCursor();
            return $orders;
        }

        public static function getBest(){
            $db = db::connect();
            $query = $db->prepare('SELECT p.name, COUNT(op.id) AS nombre FROM orderedproducts AS op
            INNER JOIN products AS p ON op.idProduct = p.id
            GROUP BY idProduct ORDER BY COUNT(id) DESC LIMIT 3');
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

        public static function addTransactionId($id, $transactionId){
            $db = db::connect();
            $query = $db->prepare("UPDATE orders SET transactionId = :transactionId WHERE id = :id");
            $query->bindvalue(':transactionId', $transactionId);
            $query->bindvalue(':id', $id);
            $query->execute();
            $query->closeCursor();
        }

        public static function cancel($id){
            $db = db::connect();
            $query = $db->prepare("UPDATE orders SET idStatus = 3 WHERE id = :id");
            $query->bindValue(':id', $id);
            $query->execute();
            $query->closeCursor();
        }

        public function get($value){
            return $this->$value;
        }

        public function set($var, $value){
            $this->$var = $value;
        }
    }

?>