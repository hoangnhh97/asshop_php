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

    }
?>