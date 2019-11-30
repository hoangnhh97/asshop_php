<?php 
    class Users extends DBConnection {
        private $con;

        public function __construct()
        {
            
        }

        public function get_Login_User($username, $pass) {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM users WHERE email=:username AND pass=:pass";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":pass", $pass);
                $stmt->execute();
                $result = $stmt->fetch();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }
    }
?>