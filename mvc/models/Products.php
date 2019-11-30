<?php 

    class Products extends DBConnection {
        protected $con;
        public function __construct()
        {
            
        }


        public function getAllProductAoLastest() {
            try {
                $con = $this->GetDBSQLi();
                $query = "SELECT DISTINCT * FROM product_with_cate pwc, category c, products p 
                        WHERE pwc.category_id=c.category_id AND pwc.product_id = p.product_id
                        AND pwc.category_id = 1 ORDER BY p.created_at LIMIT 5";
                $result = mysqli_query($con, $query);
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }

        public function getAllProductByCate($cate_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT DISTINCT * FROM product_with_cate pwc, category c, products p 
                        WHERE pwc.category_id=c.category_id AND pwc.product_id = p.product_id
                        AND pwc.category_id =:cateid ORDER BY p.created_at LIMIT 4";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":cateid", $cate_id);
                $stmt->execute();

                $result = $stmt->fetchAll();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }

        public function getSingleProduct($product_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM products WHERE product_id=:product_id";
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