<?php 
    include_once("shared/v_header.php");
?>
<section id="archive-product" class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="sidebar col-md-3">
                <?php 
                    include_once("./mvc/views/shared/v_sidebar_archive.php"); 
                ?>
            </div>
            <div class="content col-md-9">
                <?php 
                    $result = $data["singleTag"];
                ?>
                <h3><strong>Danh mục:</strong> <?php echo $result["tag_name"]; ?></h3>
                <hr>
                <div class="row">
                    <?php 
                        $row = $data["products"];
                        foreach($row as $item) {
                            $permalink = Common::template_directory()."/SanPham/".Common::generateSlug($item["name"])."/".$item["product_id"]."";
                    ?>
                    <div class="clothes-item col-md-4">
                        <div class="clothes-item-inner">
                            <div class="clothes-item-head">
                                <a href="<?php Common::checkEmptyStr($permalink); ?>">
                                    <img src="<?php echo Common::template_directory(); ?>/assets/images/products/<?php echo $item["image"]; ?>"/>
                                </a>
                            </div>
                            <div class="clothes-item-body">
                                <h3>
                                    <a href="<?php Common::checkEmptyStr($permalink); ?>">
                                        <?php Common::checkEmptyStr($item["name"]); ?>
                                    </a>
                                </h3>
                                <p><?php Common::checkEmptyStr($item["description"]) ?></p>
                                <div class="price">
                                    <span class="<?php echo Common::checkEmptyBoolean($item["new_price"])? "old-price": "primary-price" ?>">
                                        <?php Common::checkEmptyStr(number_format($item["price"])); ?>
                                        <span>₫</span>
                                    </span>
                                    <?php if(Common::checkEmptyBoolean($item["new_price"])) { ?>
                                        <span class="primary-price">
                                            <?php Common::checkEmptyStr(number_format($item["new_price"])); ?>
                                            <span>₫</span> 
                                        </span>
                                    <?php } ?>
                                </div>
                                <div class="btn-control mt-3">
                                <span><a href="<?php echo Common::template_directory(); ?>/GioHang" class="btn-buy-now btn btn-primary" data-id="<?php Common::checkEmptyStr($item["product_id"]); ?>">Mua ngay</a></span>
                                    <span><a href="javascript:;" class="btn-add-to-cart btn btn-warning" data-id="<?php Common::checkEmptyStr($item["product_id"]); ?>">Thêm vào giỏ hàng</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        
    </div>
</section>


<?php 
    include_once("shared/v_footer.php");

?>