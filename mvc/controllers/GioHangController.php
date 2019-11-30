<?php 
    class GioHangController extends Controller {


        public function Index() {
            $this->view("v_gio_hang", []);
        }


        public function AddToCart() {
            $cookiename = "_product_in_cart";
            $pid = Common::getPOST("id");
            $cart = array();
            
            if(!empty($_COOKIE[$cookiename])) {
                $cart = json_decode($_COOKIE[$cookiename], true);
                
            }

            array_push($cart, $pid);

            
            setcookie($cookiename, json_encode($cart), time() + 3600, "/");
            $_COOKIE[$cookiename] = json_encode($cart);
            $arr = json_decode($_COOKIE[$cookiename], true);

            echo count(array_count_values($arr));
        }

        public function AddedProducts() {
            $cookiename = "_product_in_cart";
            $cart = array();
            
            if(!empty($_COOKIE[$cookiename])) {
                $cart = json_decode($_COOKIE[$cookiename], true);
            }
            $arr = "";
            for($i = 0; $i < count(array_count_values($cart)); $i++) {
                $arr .= $cart[$i].',';
                
            }


            echo $arr; 
        }

        public function CountProductInCart() {
            $cookiename = "_product_in_cart";
            $cart = array();
            
            if(!empty($_COOKIE[$cookiename])) {
                $cart = json_decode($_COOKIE[$cookiename], true);
                
            }


            echo count(array_count_values($cart));
        }
    }

?>