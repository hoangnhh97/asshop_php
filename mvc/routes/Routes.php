<?php 

    Route::set('home.php', function() {
        HomeController::CreateView("v_home");
    });


    Route::set('about-us', function() {
        AboutUsController::CreateView("v_about_us");
    });


    Route::set('san-pham', function() {
        SanPhamController::CreateView("v_san_pham");
    });

    Route::set('dang-nhap', function() {
        UserController::CreateView("v_dang_nhap");
        
    });


?>