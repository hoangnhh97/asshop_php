<?php 
    
    
    $result = $data["singleProduct"];
    $permalink = Common::template_directory()."/SanPham/".Common::generateSlug($result["name"])."/".$result["product_id"]."";
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