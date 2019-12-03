<?php 
    class ThanhToanController extends Controller {
        public function Index() {
            $modelOrder = $this->model("Orders");
            $modelOrderDetails = $this->model("OrderDetails");
            $order_id = null;
            if(isset($_POST["btnPlaceOrder"]))
            {
                $user_id = Common::getPOST("txtUserId");
                $first_name = Common::getPOST("txtFirstName");
                $last_name = Common::getPOST("txtLastName");
                $full_name = $first_name . ' ' . $last_name;
                $email = Common::getPOST("txtEmail");
                $address = Common::getPOST("txtAddress");
                $city = Common::getPOST("txtCity");
                $country = Common::getPOST("txtCountry");
                $full_address = $address . ', ' . $city . ', ' . $country;
                $phone = Common::getPOST("txtPhoneNumber");
                $notes = Common::getPOST("txtNote"); 
                $from_date = date("Y-d-m", strtotime(date("Y-d-m", time()) . '+ 3 days'));
                $to_date =  date("Y-d-m", strtotime(date("Y-d-m", time()) . '+ 1 days'));
                $shipping_date = 'Thời gian: từ ' . $from_date . ' đến '  . $to_date;
                $shipping_status = 0;
                $payment_method = Common::getPOST("rdPaymentMethod");

                if(empty($email) || empty($phone)) {
                    $this->setAlert("Đặt hàng thất bại. Vui lòng kiểm tra lại thông tin đơn hàng!", "error");
                    return;
                }

                $result = $modelOrder->insert_Order($user_id, $full_name, $email, $phone, $full_address, $notes, $shipping_date, $shipping_status, $payment_method);
                $checked = false;
                if($result > 0) {
                    $this->setAlert("Đơn hàng của bạn đã được đặt thành công!", "success");
                    $checked = true;
                } else {
                    $this->setAlert("Đặt hàng thất bại. Vui lòng kiểm tra lại thông tin đơn hàng!", "error");
                    return;
                }

                $order_id = (int)$result;
                
                if(isset($_COOKIE["_product_in_cart"])) {
                    $cookie_data = stripslashes($_COOKIE['_product_in_cart']);
                    $cart_data = json_decode($cookie_data, true);
                    

                    foreach($cart_data as $keys => $values) {
                        $subtotal = $values["item_price"] * $values["item_quantity"];

                        $modelOrderDetails->insert_Order_Details($order_id, $values["item_id"], $values["item_quantity"], $subtotal);
                        
                    }

                }

                if($checked==true) {
                    unset($_COOKIE["_product_in_cart"]);
                    foreach($cart_data as $keys => $values) {
                        unset($cart_data[$keys]);
                        $item_data = json_encode($cart_data, JSON_UNESCAPED_UNICODE);
                        setcookie("_product_in_cart", $item_data, time() + 3600, "/");
                        
                    }
                }
            }
            $this->view("v_thanh_toan", [
                "singleOrder"=>$modelOrder->get_Single_Order($order_id),
            ]);
        }


    }
?>