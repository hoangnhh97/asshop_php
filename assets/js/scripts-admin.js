$(document).ready(function() {
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
});

