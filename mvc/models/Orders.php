<?php 
    class Orders extends DBConnection {
        private $con;

        public function __construct()
        {
            
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
                
                var_dump($result);
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
    }
?>