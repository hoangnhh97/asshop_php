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
                            <img src="http://localhost:8888/asshop/assets/images/products/ao-thun-1.jpg"/>
                        </div>
                        <div class="product-info col-md-8 p-3">
                            <div class="product-info-head">
                                <h3>Product Name</h3>
                                <div class="product-price">
                                    <span class="">0đ</span>
                                </div>
                                <div class="product-desc">
                                    <p>Description</p>
                                </div>
                            </div>
                            <div class="product-info-body">
                                <div class="product-info-control">
                                    <div class="btn-control">
                                        <input type="number"/>
                                        <span><a href="" class="btn btn-primary">Thêm vào giỏ hàng</a></span>
                                    </div>
                                    <ul>
                                        <li><a href=""><i class="fa fa-heart"></i>Thêm vào danh sách yêu thích</a></li>
                                        <li><a href=""><i class="fa fa-chart-line"></i>So sánh</a></li>
                                    </ul>
                                </div>
                                <div class="category">
                                    <span>Danh mục:</span>
                                    <ul>
                                        <li>Category1</li>
                                    </ul>
                                </div>
                                <div class="tags">
                                    <span>Tags:</span>
                                    <ul>
                                        <li>Tag1</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="short-desc">
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-content">
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
                </div>
            </div>
            <div class="sidebar col-md-3">
                
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
                $cate = SanPhamController::show_Current_CategoryId(Common::getGET("id"));
                $data = HomeController::show_Product_By_Cate($cate["category_id"]);
                foreach($data as $item) {
                    $permalink = "/chi-tiet/".Common::generateSlug($item["name"])."/".$item["product_id"]."";
            ?>
            <div class="clothes-item col-md-4 p-3">
                <div class="clothes-item-inner">
                    <div class="clothes-item-head">
                        <a href="<?php Common::checkEmptyStr($permalink); ?>">
                            <img src="http://localhost:8888/asshop/assets/images/products/<?php echo $item["image"]; ?>"/>
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
                            <span><a href="" class="btn-buy-now btn btn-primary">Mua ngay</a></span>
                            <span><a href="" class="btn-add-to-cart btn btn-warning">Thêm vào giỏ hàng</a></span>
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