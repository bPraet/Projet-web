<?php
    class Product{
        private $id;
        private $name;
        private $price;
        private $link;
        private $size;
        private $color;
        private $brand;

        public static function add($name, $price, $size, $color, $brand){
            $db = db::connect();
            $query = $db->prepare("INSERT INTO products (name, price, link, size, color, brand) VALUES (?,?,?,?,?,?)");
            $query->execute(array($name, $price, 'ressources/images/'.strtolower($name).'.jpg', $size, $color, $brand));
            $query->closeCursor();
        }

        public function modify(){
            $db = db::connect();
            $query = $db->prepare("UPDATE products SET name = ? WHERE id = ?");
            $query->execute(array($this->get("name"), $this->get("id")));
            $query = $db->prepare("UPDATE products SET price = ? WHERE id = ?");
            $query->execute(array($this->get("price"), $this->get("id")));
            $query = $db->prepare("UPDATE products SET link = ? WHERE id = ?");
            $query->execute(array('ressources/images/'.strtolower($this->get("name")).'.jpg', $this->get("id")));
            $query = $db->prepare("UPDATE products SET size = ? WHERE id = ?");
            $query->execute(array($this->get("size"), $this->get("id")));
            $query = $db->prepare("UPDATE products SET color = ? WHERE id = ?");
            $query->execute(array($this->get("color"), $this->get("id")));
            $query = $db->prepare("UPDATE products SET brand = ? WHERE id = ?");
            $query->execute(array($this->get("brand"), $this->get("id")));
            $query->closeCursor();
        }


        public static function remove($id){ 
            $db = db::connect();
            $query = $db->prepare("DELETE FROM products WHERE id = :id");
            $query->bindValue(':id', $id);
            $query->execute();
            $query->closeCursor();
        }

        public static function getProductById($id){
            $db = db::connect();
            $query = $db->prepare("SELECT * FROM products WHERE id = :id");
            $query->bindValue(':id', $id);
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS, 'Product');
            $product = $query->fetch();
            $query->closeCursor();
            return $product;
        }

        public static function getProductByName($name){
            $db = db::connect();
            $query = $db->prepare("SELECT * FROM products WHERE name = :name");
            $query->bindValue(':name', $name);
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS, 'Product');
            $product = $query->fetch();
            $query->closeCursor();
            return $product;
        }

        public static function getBestProducts(){
            $db = db::connect();
            $query = $db->prepare('SELECT * FROM products AS p INNER JOIN bestproducts AS bp ON p.id = bp.idProduct ORDER BY bp.id;');
            $query->execute();
            $bestProducts = $query->fetchAll();
            $query->closeCursor();
            return $bestProducts;
        }

        public static function modifyBestProduct($idNewBest, $id){
            $db = db::connect();
            $query = $db->prepare("UPDATE bestProducts SET idProduct = ? WHERE id = ?");
            $query->execute(array($idNewBest, $id));
            $query->closeCursor();
        }

        public static function getAll(){
            $db = db::connect();
            $query = $db->prepare('SELECT * FROM products');
            $query->execute();
            $products = $query->fetchAll();
            $query->closeCursor();
            return $products;
        }

        public function get($value){
            return $this->$value;
        }

        public function set($var, $value){
            $this->$var = $value;
        }
    }
?>