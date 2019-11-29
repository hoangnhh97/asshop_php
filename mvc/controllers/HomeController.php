<?php 
// require_once("./mvc/controllers/BaseController.php");
require_once("./mvc/models/Users.php");
class HomeController extends Controller {

    public function Index() {
        $modelHotDeal = $this->model("HotDeal");
        $modelProduct = $this->model("Products");
        

        

        $this->view("v_home", [
            "hotdeal1"=>$modelHotDeal->getHotDealByType(0),
            "hotdeal2"=>$modelHotDeal->getHotDealByType(0),
            "product1"=>$modelProduct->getAllProductAoLastest(),
            "productAoSoMi"=>$modelProduct->getAllProductByCate(2),
            "productAoThun"=>$modelProduct->getAllProductByCate(3),
            ]);
    }

    

}
?>