<?php 
    class ThanhToanController extends Controller {
        public function Index() {
            if(isset($_POST["txtProductName"])) {
                echo $_POST["txtProductName"];
            }
            $this->view("v_thanh_toan", [

            ]);
        }

    }
?>