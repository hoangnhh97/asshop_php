<nav class="navbar navbar-expand-lg navbar-dark bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand text-warning logo" href="#">ASSHOP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form id="search-bar" class="form-inline my-2 my-lg-0">
            <select id="ddlCategories" class="form-control">
                <option value="">--Chọn danh mục--</option>
            </select>
            <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm..." aria-label="Search">
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sản phẩm
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
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