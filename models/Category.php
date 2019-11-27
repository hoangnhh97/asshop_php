<?php 
    include_once("./configs/DBConnection.php");

    class Category {
        private static $db;

        public function __construct()
        {
            
        }


        public function getCategoryId($product_id) {
            try {
                $db = DBConnection::GetDB();
                $query = "SELECT DISTINCT * FROM product_with_cate WHERE product_id=:product_id";
                $stmt = $db->prepare($query);
                $stmt->bindParam(":product_id", $product_id);
                $stmt->execute();

                $result = $stmt->fetch();
                $db = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }


    }


?>