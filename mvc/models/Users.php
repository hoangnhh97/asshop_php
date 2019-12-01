<?php 
    class Users extends DBConnection {
        private $con;

        public function __construct()
        {
            
        }

        public function get_All_Users() {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM users u, roles r WHERE u.role_id = r.role_id";
                $stmt = $con->prepare($query);
                $stmt->execute();
                $result = $stmt->fetchAll();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
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

        public function insert_User($first_name, $last_name, $email, $pass, $phone, $address, $type, $roleid) {
            try {
                $con = $this->GetDB();
                $query = "INSERT INTO users(user_id, first_name, last_name, email, pass, user_address, phone_number, user_type, role_id, created_at)
                        VALUES (null, :firstname, :lastname, :email, :pass, :useraddress, :phonenumber, :usertype, :roleid, :createat)";
                $stmt = $con->prepare($query);
                
                $createat = date("Y-d-m", time());
                $stmt->bindParam(":firstname", $first_name);
                $stmt->bindParam(":lastname", $last_name);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":pass", $pass);
                $stmt->bindParam(":useraddress", $address);
                $stmt->bindParam(":phonenumber", $phone);
                $stmt->bindParam(":usertype", $type);
                $stmt->bindParam(":roleid", $roleid);
                $stmt->bindParam(":createat", $createat);
                
                
                $result = $stmt->execute();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return $e;
            }
        }


        public function update_User($user_id, $first_name, $last_name, $email, $pass, $phone, $address, $type, $roleid) {
            try {
                $con = $this->GetDB();
                $query = "UPDATE users
                        SET first_name=:firstname, last_name=:lastname, email=:email, pass=:pass, 
                        user_address=:useraddress, phone_number=:phonenumber, user_type=:usertype, role_id=:roleid
                        WHERE user_id=:userid";
                $stmt = $con->prepare($query);
                
                $stmt->bindParam(":userid", $user_id);
                $stmt->bindParam(":firstname", $first_name);
                $stmt->bindParam(":lastname", $last_name);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":pass", $pass);
                $stmt->bindParam(":useraddress", $address);
                $stmt->bindParam(":phonenumber", $phone);
                $stmt->bindParam(":usertype", $type);
                $stmt->bindParam(":roleid", $roleid);
                
                
                $result = $stmt->execute();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return $e;
            }
        }

        public function delete_User($user_id) {
            try {
                $con = $this->GetDB();
                $query = "DELETE FROM users WHERE user_id=:userid";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":userid", $user_id);
                $result = $stmt->execute();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return $e;
            }
        }

        public function get_Single_User($user_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM users WHERE user_id=:userid";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":userid", $user_id);
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