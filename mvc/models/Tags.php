<?php 

    class Tags extends DBConnection{
        protected $con;

        public function __construct()
        {
            
        }

        public function get_All_Tags() {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM tags";
                $stmt = $con->prepare($query);
                $stmt->execute();

                $result = $stmt->fetchAll();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }



        public function getAllTagByProductId($product_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM tags t WHERE product_id=:product_id";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":product_id", $product_id);
                $stmt->execute();

                $result = $stmt->fetchAll();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }


        public function getSingleTag($tag_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM tags WHERE tag_id=:tagid";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":tagid", $tag_id);
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