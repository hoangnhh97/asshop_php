$(document).ready(function() {

  $('#select-multi').selectpicker();

  $('#summernote').summernote();

  $('#select-multi').on('change',function(e) {
    $values = $(this).val();
    $('.arrCategories').val($values);
  }); 

  $(function() {
      // Sidebar toggle behavior
      $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
      });
    });
    
    $('#dataTable').DataTable( {
        "scrollX": true
    } );;

    setTimeout(function() {
      $('#alert-box').fadeOut();
  },3000);


  $('.btnDelete').on('click', function() {

      var $id = $(this).attr('data-id');
      
      $redirect_to_delete = getUrl() + '/Xoa/' + $id;

      $('.btnAcceptDelete').attr('href', $redirect_to_delete);

  });
});

function getUrl() {
  return window.location.protocol + "//" + window.location.host + "/" + window.location.pathname;
}
