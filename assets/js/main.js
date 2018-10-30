$(function () {

   $('#file').on('change', function () {
       var image_name = $('#file').val().split( '\\' ).pop();
       $('#file-label').html(image_name);
   });

   $('.custom-bar').on('click', function () {
     $('#sidebar').slideToggle();
   });
    
   $('.remove').on('click', function () {
     $('.flash').hide();
   });

   setTimeout(function () {
     $('.flash').fadeOut('slow');
   }, 5000);


});