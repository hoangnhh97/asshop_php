<?php 
    include_once("./configs/DBConnection.php");

    class Products {
        private static $db;

        public function __construct()
        {
            
        }


        public function getAllProductAoLastest() {
            try {
                $db = DBConnection::GetDB();
                $query = "SELECT DISTINCT * FROM product_with_cate pwc, category c, products p 
                        WHERE pwc.category_id=c.category_id AND pwc.product_id = p.product_id
                        AND pwc.category_id = 1 ORDER BY p.created_at LIMIT 5";
                $stmt = $db->prepare($query);
                $stmt->execute();

                $result = $stmt->fetchAll();
                $db = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }

        public function getAllProductByCate($cate_id) {
            try {
                $db = DBConnection::GetDB();
                $query = "SELECT DISTINCT * FROM product_with_cate pwc, category c, products p 
                        WHERE pwc.category_id=c.category_id AND pwc.product_id = p.product_id
                        AND pwc.category_id =:cateid ORDER BY p.created_at LIMIT 5";
                $stmt = $db->prepare($query);
                $stmt->bindParam(":cateid", $cate_id);
                $stmt->execute();

                $result = $stmt->fetchAll();
                $db = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }

    }


?>