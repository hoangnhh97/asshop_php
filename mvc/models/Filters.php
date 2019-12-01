<?php 

    class Filters extends DBConnection {
        private $con;
        public function __construct()
        {
            
        }


        public function search_Product_by_Cate($name, $cate_id) {
            try {
                $con = $this->GetDB();
                $product_name = "%$name%";
                $query = "SELECT DISTINCT * FROM product_with_cate pwc, products p WHERE pwc.product_id=p.product_id
                            AND pwc.category_id =:cate_id OR p.name LIKE :product_name GROUP BY p.name";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":cate_id", $cate_id);
                $stmt->bindParam(":product_name", $product_name);
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