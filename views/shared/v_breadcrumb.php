<?php 
    $product_name = Common::getGET("title");
    $product_id = Common::getGET("id");
    $permalink = "/chi-tiet/".Common::generateSlug($product_name)."/".$product_id."";
    $result = SanPhamController::show_Breadcrumb($product_id);
?>
<section id="breadcrumb">
    <div class="container">
        <ul>
            <li><a href="javascript:;">Trang chủ</a></li>
            <li><a href="javascript:;">Sản phẩm</a></li>
            <li><a href="<?php Common::checkEmptyStr($permalink); ?>"><?php Common::checkEmptyStr($result["name"]); ?></a></li>
        </ul>
    </div>
</section>