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
                        <div class="product-info col-md-8">
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

<?php 
    include_once("shared/v_footer.php");

?>