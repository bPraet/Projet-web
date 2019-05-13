<?php
    class User{
        private $id;
        private $login;
        private $password;
        private $name;
        private $firstname;
        private $email;

        public static function add($login, $password, $name, $firstname, $email){
            $db = db::connect();
            $query = $db->prepare("INSERT INTO users (login, password, name, firstname, email) VALUES (?,?,?,?,?)");
            $query->execute(array($login, password_hash($password, PASSWORD_DEFAULT), $name, $firstname, $email));
            $query->closeCursor();
        }

        public static function remove($id){ 
            $db = db::connect();
            $query = $db->prepare("DELETE FROM users WHERE id = :id");
            $query->bindValue(':id', $id);
            $query->execute();
            $query->closeCursor();
        }

        public function modify(){//login, pass, name, firstname, email
            $db = db::connect();
            $query = $db->prepare("UPDATE users SET login = ? WHERE id = ?");
            $query->execute(array($this->get("login"), $this->get("id")));
            $query = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
            $query->execute(array($this->get("password"), $this->get("id")));
            $query = $db->prepare("UPDATE users SET name = ? WHERE id = ?");
            $query->execute(array($this->get("name"), $this->get("id")));
            $query = $db->prepare("UPDATE users SET firstname = ? WHERE id = ?");
            $query->execute(array($this->get("firstname"), $this->get("id")));
            $query = $db->prepare("UPDATE users SET email = ? WHERE id = ?");
            $query->execute(array($this->get("email"), $this->get("id")));
            $query->closeCursor();
        }

        public static function getUserByLogin($login){
            $db = db::connect();
            $query = $db->prepare('SELECT * FROM users WHERE login = :login');
            $query->bindValue(':login', $login);
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $query->fetch();
            $query->closeCursor();
            return $user;
        }

        public static function getAll(){
            $db = db::connect();
            $query = $db->prepare('SELECT * FROM users');
            $query->execute();
            $users = $query->fetchAll();
            $query->closeCursor();
            return $users;
        }

        public function get($value){
            return $this->$value;
        }

        public function set($var, $value){
            $this->$var = $value;
        }
    }

?>