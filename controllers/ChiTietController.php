<?php 

    class ChiTietController extends BaseController {
        public static function show_Breadcrumb($product_id) {
            $product = new Products();
            $result = $product->getSingleProduct($product_id);
            return $result;
        }
    }
?>