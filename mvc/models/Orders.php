<?php 
    class Orders extends DBConnection {
        private $con;

        public function __construct()
        {
            
        }

        public function get_All_Orders() {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM orders";
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

        public function get_Single_Order($order_id) {
            try {
                $con = $this->GetDB();
                $query = "SELECT * FROM orders WHERE order_id=:orderid";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":orderid", $order_id);
                $stmt->execute();
                // echo $stmt->debugDumpParams();
                
                $result  = $stmt->fetch();
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return array();
            }
        }

        public function insert_Order($user_id, $full_name, $order_email, $order_phone, $order_address, $order_notes,
                                    $shipping_date, $shipping_status, $payment_method) {
            try {
                $con = $this->GetDB();
                $query = "INSERT INTO orders(order_id, user_id, full_name, order_email, order_phone, order_address, order_notes,
                            shipping_date, shipping_status, payment_method, created_at)
                        VALUES (null, :userid, :fullname, :orderemail, :orderphone, :orderaddress, :ordernotes, 
                            :shippingdate, :shippingstatus, :paymentmethod, :createdat)";
                $stmt = $con->prepare($query);
                $created_at = date("Y-d-m", time());
                $stmt->bindParam(":userid", $user_id);
                $stmt->bindParam(":fullname", $full_name);
                $stmt->bindParam(":orderemail", $order_email);
                $stmt->bindParam(":orderphone", $order_phone);
                $stmt->bindParam(":orderaddress", $order_address);
                $stmt->bindParam(":ordernotes", $order_notes);
                $stmt->bindParam(":shippingdate", $shipping_date);
                $stmt->bindParam(":shippingstatus", $shipping_status);
                $stmt->bindParam(":paymentmethod", $payment_method);
                $stmt->bindParam(":createdat", $created_at);
                $result = $stmt->execute();
                // echo $stmt->debugDumpParams();
                
                $order_id = 0;

                if($result == true) {
                    $order_id = $con->lastInsertId();
                }
                $con = null;
                return $order_id;
            } catch(PDOException $e) {
                return 0;
            }
                                        
        }



        public function update_Order($order_id, $user_id, $full_name, $order_email, $order_phone, $order_address, $order_notes,
                                    $shipping_date, $shipping_status, $payment_method) {
            try {
                $con = $this->GetDB();
                $query = "UPDATE orders SET user_id=:userid, full_name=:fullname, order_email=:orderemail, 
                            order_phone=:orderphone, order_address=:orderaddress, order_notes=:ordernotes, 
                            shipping_date=:shippingdate, shipping_status=:shippingstatus, payment_method=:paymentmethod WHERE order_id=:orderid";
                $stmt = $con->prepare($query);
                $stmt->bindParam(":orderid", $order_id);
                $stmt->bindParam(":userid", $user_id);
                $stmt->bindParam(":fullname", $full_name);
                $stmt->bindParam(":orderemail", $order_email);
                $stmt->bindParam(":orderphone", $order_phone);
                $stmt->bindParam(":orderaddress", $order_address);
                $stmt->bindParam(":ordernotes", $order_notes);
                $stmt->bindParam(":shippingdate", $shipping_date);
                $stmt->bindParam(":shippingstatus", $shipping_status);
                $stmt->bindParam(":paymentmethod", $payment_method);
                $result = $stmt->execute();
               
                $con = null;
                return $result;
            } catch(PDOException $e) {
                return 0;
            }
                                        
        }


        public function delete_Order($order_id) {
            try {
                $con = $this->GetDB();
                $result_all = true;
                $query_order_details = "DELETE FROM order_details WHERE order_id=:orderid";
                $stmt_order_details = $con->prepare($query_order_details);
                $stmt_order_details->bindParam(":orderid", $order_id);
                $result_order_details = $stmt_order_details->execute();
                if($result_order_details == false) {
                    $result_all = false;
                }

                $query_order = "DELETE FROM orders WHERE order_id=:orderid";
                $stmt_order = $con->prepare($query_order);
                $stmt_order->bindParam(":orderid", $order_id);
                $result_order = $stmt_order->execute();
                // echo $stmt->debugDumpParams();
                if($result_order == false) {
                    $result_all = false;
                }

                
                $con = null;
                return $result_all;
            } catch(PDOException $e) {
                return 0;
            }
        }
    }
?>