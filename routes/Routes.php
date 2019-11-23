<?php 

    Route::set('home.php', function() {
        Home::CreateView("Home");
    });


    Route::set('about-us', function() {
        AboutUs::CreateView("AboutUs");
    });


?>