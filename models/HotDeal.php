<?php 
    include_once("./configs/DBConnection.php");

    class HotDeal {
        private $db;

        public function __construct()
        {
            
        }


        public static function getHotDealByType($type) {
            try {
                $db = DBConnection::GetDB();
                $query = "SELECT * FROM hot_deal h, products p 
                        WHERE h.product_id = p.product_id AND type_num=:id";
                $stmt = $db->prepare($query);
                $stmt->bindParam(":id",$type);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            }catch (PDOException $e) {
                return array();
            }
        }
    }
?>