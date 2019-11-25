$(document).ready(function() {
    $('#slider .owl-carousel').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots:false,
        items: 1
    })

    
    $('#list-cate .owl-carousel').owlCarousel({
        loop:true,
        margin:0,
        nav:false,
        dots:false,
        items: 7
    })
});