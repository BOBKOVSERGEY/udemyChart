$(function () {


  $('#file').on('change', function () {
    var image_name = $('#file').val().split( '\\' ).pop();
    $('#file-label').html(image_name);
  });

  $('#change-image').on('change', function () {
    var image_name = $('#change-image').val().split( '\\' ).pop();
    $('#change-image-label').html(image_name);
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

   $('.chat-form').on('keypress', function (e) {
     if (e.keyCode == 13) {
       var sendMessage = $('#send_message').val();
       if (sendMessage.length != "") {
          $.ajax({
            type: 'POST',
            url: 'ajax/send-message.php',
            data: {sendMessage: sendMessage},
            dataType: 'JSON',
            success: function (feedback) {
              if (feedback.status == 'success') {
                $('.chat-form').trigger('reset');
                console.log('msg is sent');
              }
            }
          })
       }
     }
   })

});