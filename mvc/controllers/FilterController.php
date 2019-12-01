<?php 
    class FilterController extends Controller {
        public function Index($price_from = null, $price_to = null) {
            $modelProduct = $this->model("Products");
            $modelCategory = $this->model("Category");
            $modelFilter = $this->model("Filters");
            $modelTag = $this->model("Tags");
            $this->view("v_filter", [
                "pricefrom"=>$price_from,
                "priceto"=>$price_to,
                "products"=>$modelFilter->filter_Product_By_Price($price_from, $price_to),
                "category"=>$modelCategory->get_All_Category(),
                "tags"=>$modelTag->get_All_Tags(),
            ]);
        }
    }
?>