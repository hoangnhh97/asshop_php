<?php 
    class ThanhToanController extends Controller {
        public function Index() {
            if(isset($_POST["btnPlaceOrder"]))
            {
                
            }
            $this->view("v_thanh_toan", [

            ]);
        }

    }
?>