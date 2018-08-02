$(function () {
   $('#file').on('change', function () {
       var image_name = $('#file').val();
       $('#file-label').html(image_name);
   });
});