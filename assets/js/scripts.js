$(document).ready(function() {
  CountItemInCart();
  CheckAddedProducts();

  //Handle Add product to Cart in Single Product page
  $('._btn-add-to-cart').on('click', function(e) {
    e.preventDefault();
    var $product_id = $(this).attr('data-id');
    var $product_name = $(this).parent().parent().parent().parent().parent().find('.product-info-head h3').text().trim();
    var $price = $(this).parent().parent().parent().parent().parent().find('._price').text().replace(" ₫", "").replace(",", "").trim();
    var $quantity = $('._btn-add-to-cart').parent().parent().find('.quantity input').val();
    var $postData = {'id': $product_id, 'name': $product_name,'price':$price, 'quantity':$quantity};
    $.ajax({
      method: 'post',
      url:'http://localhost:8888/asshop/GioHang/AddToCart',
      dataType: 'html',
      data: $postData,
      success: function($response) {
        $('.count-item').text($response);
      },
      error: function (xhr, ajaxOptions, thrownError){
        alert(xhr.status);
        alert(thrownError);
      }
    });

    return false;
  });


//Handle Add product to Cart
  $('.add-to-cart').on('click', function(e) {
    e.preventDefault();
    var $product_id = $(this).attr('data-id');
    var $product_name = $(this).parent().parent().parent().parent().parent().find('h1').text().trim();
    var $price = $(this).parent().parent().parent().parent().parent().find('.primary-price').text().replace("₫", "").replace(",", "").trim();
    console.log($price);
    var $quantity = 1;
    var $postData = {'id': $product_id, 'name': $product_name,'price':$price, 'quantity':$quantity};
    $.ajax({
      method: 'post',
      url:'http://localhost:8888/asshop/GioHang/AddToCart',
      dataType: 'html',
      data: $postData,
      success: function($response) {
        $('.count-item').text($response);
      },
      error: function (xhr, ajaxOptions, thrownError){
        alert(xhr.status);
        alert(thrownError);
      }
    });

    return false;
  });

  $('.btn-add-to-cart, .btn-buy-now').on('click', function(e) {
    e.preventDefault();
    var $product_id = $(this).attr('data-id');
    var $product_name = $(this).parent().parent().parent().find('h3').text().trim();
    var $price = $(this).parent().parent().parent().find('.primary-price').text().replace("₫", "").replace(",", "").trim();
    var $quantity = 1;
    var $postData = {'id': $product_id, 'name': $product_name,'price':$price, 'quantity':$quantity};
    $.ajax({
      method: 'post',
      url:'http://localhost:8888/asshop/GioHang/AddToCart',
      dataType: 'html',
      data: $postData,
      success: function($response) {
        $('.count-item').text($response);
      },
      error: function (xhr, ajaxOptions, thrownError){
        alert(xhr.status);
        alert(thrownError);
      }
    });

    return false;
  });


  function CheckAddedProducts() {
    $.ajax({
      method: 'post',
      url:'http://localhost:8888/asshop/GioHang/AddedProducts',
      dataType: 'html',
      success: function($response) {
        $result = $response.split(',');
        for(var i = 0; i < $result.length -1; i++) {
          console.log('add-to-cart[data-id='+ $result[i] +']');
          $('.btn-add-to-cart[data-id='+ $result[i] +'], ._btn-add-to-cart[data-id='+ $result[i] +']').attr("href", "javascript:;");
          // $('.btn-add-to-cart[data-id='+ $result[i] +'], ._btn-add-to-cart[data-id='+ $result[i] +']').attr("class", "btn-add-to-cart btn btn-secondary");
          // $('.btn-add-to-cart[data-id='+ $result[i] +'], ._btn-add-to-cart[data-id='+ $result[i] +']').text("Đã thêm vào giỏ hàng");
          
        }
        
      },
      error: function (xhr, ajaxOptions, thrownError){
        alert(xhr.status);
        alert(thrownError);
      }
    });
  }

  function CountItemInCart() {
    $.ajax({
      method: 'post',
      url:'http://localhost:8888/asshop/GioHang/CountProductInCart',
      dataType: 'html',
      success: function($response) {
        $('.count-item').text($response);
        
      },
      error: function (xhr, ajaxOptions, thrownError){
        alert(xhr.status);
        alert(thrownError);
      }
    });
  }
  

  //Slider init
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

  setTimeout(function() {
      $('#alert-box').fadeOut();
  },3000);
    
});


jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
jQuery('.quantity').each(function() {
  var spinner = jQuery(this),
    input = spinner.find('input[type="number"]'),
    btnUp = spinner.find('.quantity-up'),
    btnDown = spinner.find('.quantity-down'),
    min = input.attr('min'),
    max = input.attr('max');

  btnUp.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue >= max) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue + 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

  btnDown.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue <= min) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue - 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

});


$(function() {
  // ------------------------------------------------------- //
  // Multi Level dropdowns
  // ------------------------------------------------------ //
  $("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
    event.preventDefault();
    event.stopPropagation();

    $(this).siblings().toggleClass("show");


    if (!$(this).next().hasClass('show')) {
      $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
    }
    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
      $('.dropdown-submenu .show').removeClass("show");
    });

  });
});
