<?php 

    class Category extends DBConnection{
        protected $con;

        public function __construct()
        {
            
        }

        public function get_All_Category() {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM category";
                $stmt = $con->prepare($query);
                $stmt->execute();

                $result = $stmt->fetchAll();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
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


        public function getAllCategoryByProductId($product_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM product_with_cate pwc, category c 
                        WHERE pwc.category_id = c.category_id
                         AND product_id=:product_id";
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


    }


?>