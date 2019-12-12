<?php 

class TheoDoiDonHangController extends Controller {
    public function Index() {
        $modelOrder = $this->model("Orders");
        
        $order_id = null;
        if(isset($_POST["btnPreviewOrder"])) {
            $order_id = $_POST["txtOrderId"];
        }

        $this->view("v_theo_doi_don_hang", [
            "singleOrder"=>$modelOrder->get_Single_Order($order_id),
        ]);
    }
}
?>