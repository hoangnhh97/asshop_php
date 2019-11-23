<?php 

    Route::set('home.php', function() {
        HomeController::CreateView("v_home");
    });


    Route::set('about-us', function() {
        AboutUsController::CreateView("v_about_us");
    });


?>