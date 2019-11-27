$(document).ready(function() {
    $('#partner-logo .owl-carousel').owlCarousel({
        loop: true,
        center: true,
        margin: 10,
        nav: true,
        dots: false,
        lazyLoad:true,
        items: 7
    });

    $('#slider .owl-carousel').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots:false,
        items: 1
    });

    
    $('#list-cate .owl-carousel').owlCarousel({
        loop:false,
        margin:0,
        nav:false,
        dots:false,
        items: 7
    });

    $('#sec-hot-deal .owl-carousel').owlCarousel({
        loop:true,
        margin:0,
        nav:false,
        dots:true,
        items: 1
    });


    
});