<?php 
    include_once("shared/v_header.php");
    include_once("shared/v_breadcrumb.php");
?>
<section id="product-detail">
    <div class="container">
        <div class="row">
            <div class="content col-md-9">
                <div class="product-info">
                    <div class="row">
                        <div class="product-img col-md-4">
                            <div class="product-img-inner">
                                <img src="<?php echo Common::template_directory(); ?>/assets/images/products/<?php echo $result["image"]; ?>"/>
                            </div>
                        </div>
                        <div class="product-info col-md-8 p-3">
                            <div class="product-info-head">
                                <h3><?php Common::checkEmptyStr($result["name"]); ?></h3>
                                <div class="product-price mb-3">
                                    <span class="<?php echo Common::checkEmptyBoolean($result["new_price"])?"old_price":"_price" ?>">
                                        <?php Common::checkEmptyStr(number_format($result["price"])) ?>
                                        <span>₫</span>
                                    </span>
                                    <?php if(Common::checkEmptyBoolean($result["new_price"])) { ?>
                                        <span class="_price">
                                            <?php Common::checkEmptyStr(number_format($result["new_price"])); ?>
                                            <span>₫</span>
                                        </span>
                                    <?php } ?>
                                </div>
                                <div class="product-desc">
                                    <p><?php Common::checkEmptyStr($result["short_desc"]); ?></p>
                                </div>
                            </div>
                            <div class="product-info-body">
                                <div class="product-info-control">
                                    <div class="btn-control">
                                        <div class="quantity">
                                            <input type="number" min="1" max="50" step="1" value="1">
                                        </div>
                                        
                                        <span class="ml-3">
                                            <a href="javascript:;" class="_btn-add-to-cart btn btn-primary" data-id="<?php Common::checkEmptyStr($result["product_id"]); ?>">
                                                <i class="fa fa-cart-plus"></i> Thêm vào giỏ hàng
                                            </a>
                                        </span>
                                    </div>
                                    <div class="add-to-farvorite mt-4 mb-3">
                                        <ul>
                                            <li><a href=""><i class="fa fa-heart"></i> Thêm vào danh sách yêu thích</a></li>
                                            <li><a href=""><i class="fa fa-chart-line"></i> So sánh</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <hr/>
                                <div class="category-list mb-3">
                                    <span><i class="fa fa-tags"></i> Danh mục:</span>
                                    <ul>
                                        <?php 
                                            $row = $data["categoryList"];
                                            foreach($row as $item) {
                                        ?>
                                        
                                            <li><a href=""><?php Common::checkEmptyStr($item["cate_name"]); ?></a></li>
                                        
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="tag-list mb-3">
                                    <span><i class="fa fa-tag"></i> Thẻ:</span>
                                    <ul>
                                        <?php 
                                            $row = $data["tagList"];
                                            foreach($row as $item) {
                                        ?>
                                        
                                            <li><a href=""><?php Common::checkEmptyStr($item["tag_name"]); ?></a></li>
                                        
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- <div class="short-desc">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="product-content">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Chi tiết</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Đánh giá</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active p-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <p><?php Common::checkEmptyStr($result["description"]); ?></p>
                        </div>
                        <div class="tab-pane fade p-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                    </div>
                </div>
            </div>
            <div class="sidebar col-md-3">
                <?php 
                    include_once("./mvc/views/shared/v_sidebar_product.php"); 
                ?>
            </div>
        </div>
        
    </div>
</section>



<section id="related-products" class="pt-5 pb-3">
    <div class="container">
        <div class="h-related">
            <h2>Sản phẩm liên quan</h2>
        </div>
        <div class="row">
            <?php 
                $data = $data["relatedProduct"];
                foreach($data as $item) {
                    $permalink = Common::template_directory()."/SanPham/".Common::generateSlug($item["name"])."/".$item["product_id"]."";

            ?>
            <div class="clothes-item col-md-3 p-3">
                <div class="clothes-item-inner">
                    <div class="clothes-item-head">
                        <a href="<?php Common::checkEmptyStr($permalink); ?>">
                            <img src="<?php echo Common::template_directory(); ?>/assets/images/products/<?php echo $item["image"]; ?>"/>
                        </a>
                    </div>
                    <div class="clothes-item-body">
                        <h3>
                            <a href="<?php echo $permalink; ?>">
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
</section>
<?php 
    include_once("shared/v_footer.php");

?>