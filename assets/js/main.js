$(function () {

  function scrollByEndMessage()
  {
    $('.messages').animate({scrollTop: $('.messages')[0].scrollHeight}, 2000);
  }

  scrollByEndMessage();

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
                showMessages();
                scrollByEndMessage();
              }
            }
          })
       }
     }
   });

  // Upload images and file
  $('#upload-files').on('change', function () {
    var fileName = $('#upload-files').val();
    if (fileName != '') {
      $.ajax({
        type : 'POST',
        url : 'ajax/send-files.php',
        data : new FormData($('.chat-form')[0]),
        contentType: false,
        processData: false,
        success: function (r) {
          if (r == 'error') {
            $('.files-error').addClass('show-file-error');
            $('.files-error').html('<span class="files-cross-icon">&#x2715;</span> Please chose valid image/file');
            setTimeout(function () {
              $('.files-error').removeClass('show-file-error');
            }, 5000);
          } else if (r == 'success') {
            showMessages();
            scrollByEndMessage();
          }
        }
      });
    }

  });
  
  // send emojy
  $('.emoji-same').on('click', function () {
    var emojy = $(this).attr('src');
    $.ajax({
      type: 'POST',
      url: 'ajax/send-emojy.php',
      data: {'send-emojy':emojy},
      dataType: 'JSON',
      success: function (r) {
        if (r.status == 'success') {
          showMessages();
          scrollByEndMessage();
        }
      },
      error: function (r) {
        console.log('error');
      }
    });
  })

  setInterval(function () {
    showMessages();
    usersStatus();
  }, 3000);

});


function usersStatus() {
  $.ajax({
    type: 'GET',
    url: 'ajax/users_status.php',
    dataType: 'JSON',
    success: function (r) {
      console.log(r);
      if (r['status'] == 'href') {
        window.location = 'login.php'
      }
    },
    error: function (r) {
      console.log(r);
    }
  })
}



function showMessages() {
  var msg = true;
  $.ajax({
    type : 'GET',
    url : 'ajax/show_messages.php',
    data : {'message':msg},
    success: function (r) {
      $('.messages').html(r);
    },
    error: function (r) {
      console.log(r);
    }
  })
}

showMessages();