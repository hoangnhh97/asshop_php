<?php 
    include_once("./configs/DBConnection.php");
    class Users {
        private $db;

        public function __construct()
        {
            
        }

        public function get_Login_User($username, $pass) {
            try {
                $db = DBConnection::GetDB();
                $query = "SELECT * FROM users WHERE email=:username AND pass=:pass";
                $stmt = $db->prepare($query);
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":pass", $pass);
                
                
                $result = $stmt->execute();
                $db = null;
                return $result;
            } catch(PDOException $e) {
                return 0;
            }
        }
    }
?>