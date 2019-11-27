<?php 
    include_once("configs/DBConnection.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Home</title>

        <link href="http://localhost:8888/asshop/assets/css/all.min.css" rel="stylesheet"/>
        <link href="http://localhost:8888/asshop/assets/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="http://localhost:8888/asshop/assets/css/owl.carousel.min.css" rel="stylesheet"/>
        <link href="http://localhost:8888/asshop/assets/css/owl.theme.default.min.css" rel="stylesheet"/>
        <link href="http://localhost:8888/asshop/assets/css/styles.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    </head>
    <body>
        <div id="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            <li><a href="tel:"><i class="fa fa-phone-alt"></i> 0123456789</a></li>
                            <li><a href="mailto:contact@asshop.com"><i class="far fa-envelope"></i> contact@asshop.com</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="text-right">
                            <li><a href=""><i class="fa fa-map-marked"></i> Địa chỉ</a></li>
                            <li><a href=""><i class="fas fa-truck"></i> Theo dõi đơn hàng</a></li>
                            <li><a href=""><i class="fa fa-shopping-bag"></i> Cửa hàng</a></li>
                            <li><a href=""><i class="fa fa-user"></i> Đăng nhập/Đăng ký</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
            
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
        <div id="wrapper">