<?php 

    class HotDeal extends DBConnection {

        public function __construct()
        {
            
        }


        public function getHotDealByType($type) {
            $con = $this->GetDBSQLi();
            $query = "SELECT * FROM hot_deal h, products p WHERE h.product_id = p.product_id AND type_num=?";
            $stmt = $con->prepare($query);
            $stmt->bind_param("i", $type);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $con = null;
            return $result;
        }
    }
?>