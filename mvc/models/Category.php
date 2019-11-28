<?php 

    class Category extends DBConnection{
        protected $con;

        public function __construct()
        {
            
        }


        public function getCategoryId($product_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT DISTINCT * FROM product_with_cate WHERE product_id=:product_id";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":product_id", $product_id);
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