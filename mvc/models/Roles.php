<?php 

    class Roles extends DBConnection {
        private $con;

        public function __construct()
        {
            
        }

        public function get_All_Role() {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM roles";
                $stmt = $con->prepare($query);
                $stmt->execute();
                $result = $stmt->fetchAll();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }


        public function insert_Role($role_name, $role_desc) {
            try {
                $con = $this->GetDB();
                $query = "INSERT INTO roles(role_id, role_name, role_desc) VALUES (null, :rolename, :roledesc)";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":rolename", $role_name);
                $stmt->bindParam(":roledesc", $role_desc);
                $result = $stmt->execute();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return 0;
            }
        }

       
        public function update_Role($role_id, $role_name, $role_desc) {
            try {
                $con = $this->GetDB();
                $query = "UPDATE roles SET role_name=:rolename, role_desc=:roledesc
                         WHERE role_id=:roleid";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":rolename", $role_name);
                $stmt->bindParam(":roledesc", $role_desc);
                $stmt->bindParam(":roleid", $role_id);
                $result = $stmt->execute();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return 0;
            }
        }


        
        public function delete_Role($role_id) {
            try {
                $con = $this->GetDB();
                $query = "DELETE FROM roles WHERE role_id=:roleid";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":roleid", $role_id);
                $result = $stmt->execute();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return 0;
            }
        }

        public function get_Single_Role($role_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM roles WHERE role_id=:roleid";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":roleid", $role_id);
                $stmt->execute();
                $result = $stmt->fetch();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return 0;
            }
        }


    }
?>