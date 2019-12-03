<?php 
    class OrderDetails extends DBConnection  {
        private $con;

        public function __construct()
        {
            
        }

        public function get_Single_Order_Detail($order_detail_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM order_details od, products p WHERE od.product_id = p.product_id AND od.order_detail_id=:orderdetailis";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":orderdetailis", $order_detail_id);
                $stmt->execute();
                // echo $stmt->debugDumpParams();
                
                $result  = $stmt->fetch();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }

        public function update_Order_Detail($order_detail_id, $order_id, $product_id, $quantity, $total) {
            try {
                $con = $this->GetDB();
                $query = "UPDATE order_details SET order_id=:orderid, product_id=:productid, quantity=:quantity, total=:total WHERE order_detail_id=:orderdetailid";
                $stmt = $con->prepare($query);
                
                $stmt->bindParam(":orderdetailid", $order_detail_id);
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

        public function delete_Order_Detail($order_detail_id) {
            try {
                $con = $this->GetDB();
                $query = "DELETE FROM order_details WHERE order_detail_id=:orderdetailid";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":orderdetailid", $order_detail_id);
                
                $result = $stmt->execute();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return 0;
            }
                                        
        }
        public function get_All_Order_Details() {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM order_details od, products p WHERE od.product_id = p.product_id";
                $stmt = $con->prepare($query);
                $stmt->execute();
                // echo $stmt->debugDumpParams();
                
                $result  = $stmt->fetchAll();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }

        

        public function insert_Order_Details($order_id, $product_id, $quantity, $total) {
            try {
                $con = $this->GetDB();
                $query = "INSERT INTO order_details(order_detail_id, order_id, product_id, quantity, total)
                        VALUES (null, :orderid, :productid, :quantity, :total)";
                $stmt = $con->prepare($query);
                
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