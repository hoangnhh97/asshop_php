<?php 

    class SanPhamController extends BaseController {
        public static function show_Breadcrumb($product_id) {
            $product = new Products();
            $result = $product->getSingleProduct($product_id);
            return $result;
        }

        public static function show_Current_CategoryId($product_id) {
            $cate = new Category();
            $result = $cate->getCategoryId($product_id);
            return $result;
        }
    }
?>