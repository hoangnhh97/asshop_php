<?php 
class HomeController extends BaseController {
    public static function showAllProductLastest() {
        $products = new Products();
        $result = $products->getAllProductAoLastest();
        return $result;
    }


    public static function show_Product_By_Cate($cate_id) {
        $products = new Products();
        $result = $products->getAllProductByCate($cate_id);
        return $result;
    }

    public static function show_Hot_Deal($type) {
        $hotdeal = new HotDeal();
        $result = $hotdeal->getHotDealByType($type);
        return $result;
    }
}
?>