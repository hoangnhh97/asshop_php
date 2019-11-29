<?php 
    include_once("./mvc/views/shared/v_header.php");

?>

<section id="slider">
    <div class="owl-carousel owl-theme">
        <div class="item">
            <div class="item-banner">
                <img src="<?php echo Common::template_directory(); ?>/assets/images/banner-1.jpg"/>
            </div>
            <div class="item-text">
                <h3>Arrival Offer Available <br/> <span>Upto 40% Flat</span></h3>
                <p>Discount On Women's Every Items <br/> <span>Stay Tuned For Sale Date</span></p>
            </div>
        </div>
        <div class="item">
            <div class="item-banner">
                <img src="<?php echo Common::template_directory(); ?>/assets/images/banner-2.jpg"/>
            </div>
            <div class="item-text">
                <h3>Arrival Offer Available <br/> <span>Upto 40% Flat</span></h3>
                <p>Discount On Women's Every Items <br/> <span>Stay Tuned For Sale Date</span></p>
            </div>
        </div>
    </div>
</section>


<section id="list-cate" class="pt-5 pb-5">
    <div class="container">
        <div class="h-title-gray">
            <h2>Danh mục sản phẩm <span>Chọn sản phẩm bạn đang tìm kiếm</span></h2>
        </div>
        <div class="owl-carousel owl-theme">
            <div class="item">
                <div class="cate-img">
                    <a href=""><img src="<?php echo Common::template_directory(); ?>/assets/images/cat-balo.jpg" /></a>
                </div>
            </div>
            <div class="item">
                <div class="cate-img">
                    <a href=""><img src="<?php echo Common::template_directory(); ?>/assets/images/cat-giay.jpg" /></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="ads-block-sec" class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="ads-block ads-block-1 col-md-6">
                <a href=""><img src="http://wordpress.templatemela.com/woo/WCM04/WCM040092/WP1/wp-content/uploads/2019/03/Sub-banner-07.jpg" width="100%"/></a>
            </div>
            <div class="ads-block ads-block-2 col-md-6">
                <a href=""><img src="http://wordpress.templatemela.com/woo/WCM04/WCM040092/WP1/wp-content/uploads/2019/03/Sub-banner-08.jpg" width="100%"/></a>
            </div>
        </div>
    </div>
</section>

<!--- BEGIN hot deal --->
<section id="sec-hot-deal" class="pt-5 pb-5">
    <div class="container">
        <div class="h-title text-danger">
            <h2>Hot Deal</h2>
        </div>
        <div class="row">
            <div class="hot-deal-1 col-md-6">
                <div class="hot-deal-box pt-5 pb-5">
                    <div class="owl-carousel owl-theme">
                        <!--- BEGIN item --->
                            <?php 
                                
                                while($item = mysqli_fetch_array($data["hotdeal1"])) {
                                    $permalink = Common::template_directory()."/SanPham/".Common::generateSlug($item["name"])."/".$item["product_id"]."";
                            ?>
                            <div class="item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="<?php echo Common::template_directory(); ?>/assets/images/products/<?php Common::checkEmptyStr($item["image"]); ?>" />
                                    </div>
                                    <div class="col-md-8">
                                        <div class="item-head">
                                            <h1><a href="<?php Common::checkEmptyStr($permalink); ?>"><?php Common::checkEmptyStr($item["name"]); ?></a></h1>
                                            <div class="rating">*</div>
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
                                        </div>
                                        <div class="item-body">
                                            <p class="desc"></p>
                                            <div class="count-down">
                                                <ul>
                                                    <li><span class="days"><?php Common::checkEmptyStr($item["days"]); ?></span> <br><span>Days</span></li>
                                                    <li><span class="hours"><?php Common::checkEmptyStr($item["hours"]); ?></span> <br><span>Hours</span></li>
                                                    <li><span class="minutes"><?php Common::checkEmptyStr($item["mins"]); ?></span> <br><span>Mins</span></li>
                                                    <li><span class="seconds"><?php Common::checkEmptyStr($item["secs"]); ?></span> <br><span>Secs</span></li>
                                                </ul>
                                            </div>
                                            <div class="group-button">
                                                <ul>
                                                    <li><a href="javascript:;"><i class="fa fa-shopping-cart"></i></a></li>
                                                    <li><a href="<?php Common::checkEmptyStr($permalink) ?>"><i class="fa fa-eye"></i></a></li>
                                                    <li><a href="javascript:;"><i class="fa fa-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        <?php } ?>
                        
                        <!--- END item --->

                    </div>
                </div>
            </div>
            <div class="hot-deal-2 col-md-6">
                <div class="hot-deal-box pt-5 pb-5">
                    <div class="owl-carousel owl-theme">
                        <!--- BEGIN item --->
                        <?php 
                                
                                while($item = mysqli_fetch_array($data["hotdeal2"])) {
                                    $permalink = Common::template_directory()."/SanPham/".Common::generateSlug($item["name"])."/".$item["product_id"]."";
                            ?>
                            <div class="item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="<?php echo Common::template_directory(); ?>/assets/images/products/<?php Common::checkEmptyStr($item["image"]); ?>" />
                                    </div>
                                    <div class="col-md-8">
                                        <div class="item-head">
                                            <h1><a href="<?php Common::checkEmptyStr($permalink); ?>"><?php Common::checkEmptyStr($item["name"]); ?></a></h1>
                                            <div class="rating">*</div>
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
                                        </div>
                                        <div class="item-body">
                                            <p class="desc"></p>
                                            <div class="count-down">
                                                <ul>
                                                    <li><span class="days"><?php Common::checkEmptyStr($item["days"]); ?></span> <br><span>Days</span></li>
                                                    <li><span class="hours"><?php Common::checkEmptyStr($item["hours"]); ?></span> <br><span>Hours</span></li>
                                                    <li><span class="minutes"><?php Common::checkEmptyStr($item["mins"]); ?></span> <br><span>Mins</span></li>
                                                    <li><span class="seconds"><?php Common::checkEmptyStr($item["secs"]); ?></span> <br><span>Secs</span></li>
                                                </ul>
                                            </div>
                                            <div class="group-button">
                                                <ul>
                                                    <li><a href="javascript:;"><i class="fa fa-shopping-cart"></i></a></li>
                                                    <li><a href="<?php Common::checkEmptyStr($permalink) ?>"><i class="fa fa-eye"></i></a></li>
                                                    <li><a href="javascript:;"><i class="fa fa-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        <?php } ?>
                        <!--- END item --->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--- END hot deal --->

<section id="sec-clothes">
    <div class="container">
        <div class="h-title">
            <h2>Chuyên Các Loại Áo</h2>
            <div class="nav-list-tab float-right">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-clothes1-default-tab" data-toggle="pill" href="#pills-clothes1-default" role="tab" aria-controls="pills-home" aria-selected="true">Mới nhất</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-clothes2-tab" data-toggle="pill" href="#pills-clothes2" role="tab" aria-controls="pills-profile" aria-selected="false">Áo sơ mi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-clothes3" role="tab" aria-controls="pills-contact" aria-selected="false">Áo thun</a>
                    </li>
                </ul>
            </div>
        </div>
        
       <div class="clothes-content">
            <div class="row">
                <div class="col-md-3">
                    <img src="<?php echo Common::template_directory(); ?>/assets/images/cat-left-banner01.png" width="100%"/>
                </div>
                <div class="tab-content col-md-9 pt-3 pb-3" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-clothes1-default" role="tabpanel" aria-labelledby="pills-clothes1-default-tab">
                        <div class="row">
                            <?php 
                                while($item = mysqli_fetch_array($data["product1"])) {
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
                                            <span><a href="" class="btn-buy-now btn btn-primary">Mua ngay</a></span>
                                            <span><a href="" class="btn-add-to-cart btn btn-warning">Thêm vào giỏ hàng</a></span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-clothes2" role="tabpanel" aria-labelledby="pills-clothes2-tab">
                        <div class="row">
                            <?php 
                                $row = $data["productAoSoMi"];
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
                                            <span><a href="" class="btn-buy-now btn btn-primary">Mua ngay</a></span>
                                            <span><a href="" class="btn-add-to-cart btn btn-warning">Thêm vào giỏ hàng</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-clothes3" role="tabpanel" aria-labelledby="pills-clothes3-tab">
                        <div class="row">
                            <?php 
                                $row = $data["productAoThun"];
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
                                            <span><a href="" class="btn-buy-now btn btn-primary">Mua ngay</a></span>
                                            <span><a href="" class="btn-add-to-cart btn btn-warning">Thêm vào giỏ hàng</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
       </div>
        
    </div>
</section>


<section id="partner-logo" class="pt-5 pb-5">
    <div class="container">
        <div class="owl-carousel owl-theme">
            <div class="item"><img src="<?php echo Common::template_directory(); ?>/assets/images/partners/brand1.jpg"/></div>
            <div class="item"><img src="<?php echo Common::template_directory(); ?>/assets/images/partners/brand2.jpg"/></div>
            <div class="item"><img src="<?php echo Common::template_directory(); ?>/assets/images/partners/brand3.jpg"/></div>
            <div class="item"><img src="<?php echo Common::template_directory(); ?>/assets/images/partners/brand4.jpg"/></div>
        </div>
    </div>

</section>

<?php 
    include_once("./mvc/views/shared/v_footer.php");

?>