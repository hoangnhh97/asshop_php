<nav class="navbar navbar-expand-lg navbar-dark bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand text-warning logo" href="#">ASSHOP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form action="<?php echo Common::template_directory(); ?>/Search/Index" method="get" id="search-bar" class="form-inline my-2 my-lg-0">
            <?php 
                $category = new Category();
                $result = $category->get_All_Category();
            ?>
            <select id="ddlCategories" name="s" class="form-control">
                <option value="">--Chọn danh mục--</option>
                <?php foreach($result as $item) { ?>
                    <option value="<?php Common::checkEmptyStr($item["category_id"]); ?>"><?php Common::checkEmptyStr($item["cate_name"]) ?></option>
                <?php } ?>
            </select>
            <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="Tìm kiếm..." aria-label="Search">
            <button class="btn-search my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
        </form>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Trang chủ <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Giới thiệu</a>
                </li>
                <!-- Level one dropdown -->
                <li class="nav-item dropdown">
                <a id="dropdownMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Sản phẩm</a>
                    <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="#" class="dropdown-item">Some action </a></li>
                        <li><a href="#" class="dropdown-item">Some other action</a></li>

                        <li class="dropdown-divider"></li>

                        <!-- Level two dropdown-->
                        <li class="dropdown-submenu">
                        <a id="dropdownMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                        <ul aria-labelledby="dropdownMenu2" class="dropdown-menu border-0 shadow">
                            <li>
                            <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                            </li>

                            <!-- Level three dropdown-->
                            <li class="dropdown-submenu">
                            <a id="dropdownMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                            <ul aria-labelledby="dropdownMenu3" class="dropdown-menu border-0 shadow">
                                <li><a href="#" class="dropdown-item">3rd level</a></li>
                                <li><a href="#" class="dropdown-item">3rd level</a></li>
                            </ul>
                            </li>
                            <!-- End Level three -->

                            <li><a href="#" class="dropdown-item">level 2</a></li>
                            <li><a href="#" class="dropdown-item">level 2</a></li>
                        </ul>
                        </li>
                        <!-- End Level two -->
                    </ul>
                </li>
                <!-- End Level one -->
                <li class="nav-item">
                    <a class="nav-link" href="#">Tin tức</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên hệ</a>
                </li>
            </ul>
            
            <div class="navbar-right" id="shop-cart">
                <ul>
                    <li><a href=""><i class="fa fa-heart"></i></a></li>
                    <li class="cart"><a href=""><i class="fa fa-shopping-cart"></i><span class="count-item">0</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>