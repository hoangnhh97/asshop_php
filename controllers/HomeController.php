<?php 
include_once("./models/Products.php");
class HomeController extends BaseController {
    public static function showAllProductLastest() {
        $products = new Products();
        $result = $products->getAllProductAoLastest();
        return $result;
    }


    public static function show_Product_AoSoMi() {
        $products = new Products();
        $result = $products->getAllProductByCate(2);
        return $result;
    }


    public static function show_Product_AoThun() {
        $products = new Products();
        $result = $products->getAllProductByCate(3);
        return $result;
    }
}
?>