<?php 
    class DanhMucController extends Controller {
        public function Index($cate_name = null, $cate_id = null) {
            $modelProduct = $this->model("Products");
            $modelCategory = $this->model("Category");
            $modelTag = $this->model("Tags");
            $this->view("v_danh_muc", [
                "products"=>$modelProduct->get_All_Product_By_CateId($cate_id),
                "category"=>$modelCategory->get_All_Category(),
                "singleCate"=>$modelCategory->getSingleCateById($cate_id),
                "tags"=>$modelTag->get_All_Tags(),
            ]);
        }
    }
?>