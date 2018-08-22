$(function () {
   $('#file').on('change', function () {
       var image_name = $('#file').val().split( '\\' ).pop();
       $('#file-label').html(image_name);
   });
});