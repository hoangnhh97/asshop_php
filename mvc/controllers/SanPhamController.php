<?php 

    class SanPhamController extends Controller {
        public function Index($id) {
            $modelCategory = $this->model("Category");
            $modelProduct = $this->model("Products");
            $modelTags = $this->model("Tags");
            $cateId = $modelCategory->getCategoryId($id);

            $this->view("v_san_pham", [
                "singleProduct"=>$modelProduct->getSingleProduct($id),
                "relatedProduct"=>$modelProduct->getAllProductByCate($cateId["category_id"]),
                "categoryList"=>$modelCategory->getAllCategoryByProductId($id),
                "tagList"=>$modelTags->getAllTagByProductId($id),
            ]);
        }
    }
?>