<?php 
    class OrderDetails extends DBConnection  {
        private $con;

        public function __construct()
        {
            
        }


        public function insert_Order_Details($order_id, $product_id, $quantity, $total) {
            try {
                $con = $this->GetDB();
                $query = "INSERT INTO order_details(order_detail_id, order_id, product_id, quantity, total)
                        VALUES (null, :orderid, :productid, :quantity, :total)";
                $stmt = $con->prepare($query);
                
                $created_at = date("Y-d-m", time());
                $stmt->bindParam(":orderid", $order_id);
                $stmt->bindParam(":productid", $product_id);
                $stmt->bindParam(":quantity", $quantity);
                $stmt->bindParam(":total", $total);
                
                $result = $stmt->execute();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return 0;
            }
                                        
        }
    }
?>