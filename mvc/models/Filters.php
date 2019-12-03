<?php 

    class Filters extends DBConnection {
        private $con;
        public function __construct()
        {
            
        }
        public function filter_Product_By_Price($price_from, $price_to) {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM products 
                        WHERE price BETWEEN :pricefrom AND :priceto ORDER BY created_at";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":pricefrom", $price_from);
                $stmt->bindParam(":priceto", $price_to);
                $stmt->execute();

                $result = $stmt->fetchAll();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }


        public function search_Product_by_Cate($name, $cate_id) {
            try {
                $con = $this->GetDB();
                $product_name = "%$name%";
                $query = "";
                if(!empty($name) && $name != "null" && !empty($cate_id)) {
                    $query = "SELECT DISTINCT * FROM product_with_cate pwc, products p WHERE pwc.product_id=p.product_id
                            AND pwc.category_id =:cate_id AND p.name LIKE :product_name GROUP BY p.name";
                } else {
                    $query = "SELECT DISTINCT * FROM product_with_cate pwc, products p WHERE pwc.product_id=p.product_id
                            AND pwc.category_id =:cate_id OR p.name LIKE :product_name GROUP BY p.name";
                }
                
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