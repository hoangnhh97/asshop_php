<?php 

    class SanPhamController extends Controller {
        public function Index($title, $id) {
            $modelCategory = $this->model("Category");
            $modelProduct = $this->model("Products");
            
            $cateId = $modelCategory->getCategoryId($id);

            $this->view("v_san_pham", [
                "singleProduct"=>$modelProduct->getSingleProduct($id),
                "relatedProduct"=>$modelProduct->getAllProductByCate($cateId["category_id"]),
            ]);
        }
    }
?>