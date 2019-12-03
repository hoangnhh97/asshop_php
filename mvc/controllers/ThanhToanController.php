<?php 
    class ThanhToanController extends Controller {
        public function Index() {
            if(isset($_COOKIE["_product_in_cart"]))
            {
                $total = 0;
                $cookie_data = stripslashes($_COOKIE['_product_in_cart']);
                $cart_data = json_decode($cookie_data, true);
                $index = 0;
                foreach($cart_data as $keys => $values) {
                    $total += ($values["item_price"] * $values["item_quantity"]);
                    $index++;
                }
            
            }
            $this->view("v_thanh_toan", [

            ]);
        }

    }
?>