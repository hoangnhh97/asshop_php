<?php 
    class FilterController extends Controller {
        public function Index($tag_name = null, $tag_id = null) {
            $modelProduct = $this->model("Products");
            $modelCategory = $this->model("Category");
            $modelTag = $this->model("Tags");
            $this->view("v_tag", [
                "products"=>$modelProduct->get_All_Product_By_TagId($tag_id),
                "category"=>$modelCategory->get_All_Category(),
                "singleTag"=>$modelTag->getSingleTag($tag_id),
                "tags"=>$modelTag->get_All_Tags(),
            ]);
        }
    }
?>