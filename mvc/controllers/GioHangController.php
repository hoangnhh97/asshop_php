<?php 
    class GioHangController extends Controller {


        public function Index() {
            $this->view("v_gio_hang", []);
        }

       

        public function AddToCart() {
            $cookiename = "_product_in_cart";
            $pid = Common::getPOST("id");
            $pname = Common::getPOST("name");
            $pprice = Common::getPOST("price");
            $pquantity = 1;
            if(isset($_POST["quantity"])) {
                $pquantity = $_POST["quantity"];
            }

            $cart = array();
            
            if(isset($_COOKIE[$cookiename])) {
                $cookie_data = stripslashes($_COOKIE[$cookiename]);
                $cart = json_decode($cookie_data, true);
                
            }

            $item_id_list = array_column($cart, 'item_id');

            if(in_array($pid, $item_id_list)) {
                foreach($cart as $keys => $value) {
                    if($cart[$keys]["item_id"] == $pid) {
                        $cart[$keys]["item_quantity"] += $pquantity;
                    }
                }
            } else {
                $item_array = array(
                    'item_id'   => $pid,
                    'item_name'   => $pname,
                    'item_price'  => $pprice,
                    'item_quantity'  => $pquantity
                   );
                $cart[] = $item_array;
            }
            
            $item_data = json_encode($cart, JSON_UNESCAPED_UNICODE);
            setcookie($cookiename, $item_data, time() + 3600, "/");

            echo count($cart);
        }

        public function AddedProducts() {
            $cookiename = "_product_in_cart";
            $cart = array();
            
            if(!empty($_COOKIE[$cookiename])) {
                $cart = json_decode($_COOKIE[$cookiename], true);
            }
            $arr = "";
            foreach($cart as $keys => $value) {
                $arr .= $cart[$keys]["item_id"] . ",";
            }

            echo $arr;
        }

        public function CountProductInCart() {
            $cookiename = "_product_in_cart";
            $cart = array();
            
            if(!empty($_COOKIE[$cookiename])) {
                $cart = json_decode($_COOKIE[$cookiename], true);
                
            }


            echo count($cart);
        }


        public function Delete($id) {
            
            $cookie_data = stripslashes($_COOKIE['_product_in_cart']);
            $cart_data = json_decode($cookie_data, true);
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]['item_id'] == $id)
                {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data, JSON_UNESCAPED_UNICODE);
                    setcookie("_product_in_cart", $item_data, time() + 3600, "/");
                    header("location:".Common::template_directory()."/GioHang");
                }
            }
            
        }

        public function Update() {
            // if(!empty($_POST["list_item_id"]) && !empty($_POST["list_item_quantity"])) {
                
            // }

            $list_item_id = Common::getPOST("list_item_id");
            $list_item_quantity = Common::getPOST("list_item_quantity");

            
            $cookie_data = stripslashes($_COOKIE['_product_in_cart']);
            $cart_data = json_decode($cookie_data, true);
            $i = 0;
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]['item_id'] == $list_item_id[$i])
                {
                    $cart_data[$keys]['item_quantity'] = $list_item_quantity[$i];
                    $item_data = json_encode($cart_data, JSON_UNESCAPED_UNICODE);
                    setcookie("_product_in_cart", $item_data, time() + 3600, "/");
                }

                $i++;
            }

            header("location:".Common::template_directory()."/GioHang");
            
        }
    }

?>