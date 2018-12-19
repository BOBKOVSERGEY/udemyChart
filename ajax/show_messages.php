<?php
require __DIR__ . '/../init.php';
$obj = new Base();

if (isset($_GET['message'])) {

  $userId = $_SESSION['user_id'];

  if ($obj->normalQuery('SELECT clean_message_id FROM clean WHERE clean_user_id = ?', [$userId])) {
    $lastMsgRow = $obj->fetchOne();
    $lastMsgId = $lastMsgRow->clean_message_id;

    $obj->normalQuery('SELECT msg_id FROM messages ORDER BY msg_id DESC LIMIT 1');
    $msgRow = $obj->fetchOne();
    $msgTableId = $msgRow->msg_id;


    $obj->normalQuery("SELECT * FROM messages INNER JOIN users ON messages.user_id = users.id WHERE messages.msg_id BETWEEN $lastMsgId AND $msgTableId ORDER BY messages.msg_id ASC");

    if ($obj->countRows() == 0) {
      echo 'Давайте начнем разговор с вашими друзьями';
    } else {

      $messagesRow = $obj->fetchAll();

      foreach($messagesRow as $message) {

        $fullName = $message->name;
        $userImage = $message->image;
        $userStatus = $message->status;

        $bodyMessage = $message->message;
        $bodyMessageType = $message->msg_type;
        $dbUserId = $message->user_id;
        $msgTime = $message->msg_time;

        if ($dbUserId == $userId) {
          // right user's msg
          if ($bodyMessageType == 'text') {
            echo '<div class="right-messages common-margin">
                    <div class="right-msg-area">
                      <span class="date-time right-time">
                        1 day ago
                      </span>
                      <div class="right-msg">
                        <p>' . $bodyMessage . '</p>
                      </div>
                    </div>
                  </div>';
          } else if ($bodyMessageType == 'jpg' || $bodyMessageType == 'JPG' || $bodyMessageType == 'JPEG' || $bodyMessageType == 'jpeg') {
            echo '<div class="right-messages common-margin">
                    <div class="right-msg-area">
                      <span class="date-time right-time">
                        1 day ago
                      </span>
                      <div class="right-files">
                        <img src="/assets/img/' . $bodyMessage . '" alt="">
                      </div>
                    </div>
                  </div>';
          } else if ($bodyMessageType == 'png' || $bodyMessageType == 'PNG') {
            echo '<div class="right-messages common-margin">
                    <div class="right-msg-area">
                      <span class="date-time right-time">
                        1 day ago
                      </span>
                      <div class="right-files">
                        <img src="/assets/img/' . $bodyMessage . '" alt="">
                      </div>
                    </div>
                  </div>';
          } else if ($bodyMessageType == 'zip' || $bodyMessageType == 'ZIP') {
            echo '<div class="right-messages common-margin">
                    <div class="right-msg-area">
                      <span class="date-time right-time">
                        1 day ago
                      </span>
                      <div class="right-files">
                        <a href="/assets/img/' . $bodyMessage . '"><i class="fas fa-arrow-circle-down"></i> ' . $bodyMessage . '</a>
                      </div>
                    </div>
                  </div>';
          } else if ($bodyMessageType == 'pdf' || $bodyMessageType == 'PDF') {
            echo '<div class="right-messages common-margin">
                    <div class="right-msg-area">
                      <span class="date-time right-time">
                        1 day ago
                      </span>
                      <div class="right-files">
                        <a href="/assets/img/' . $bodyMessage . '"><i class="fas fa-file-pdf pdf"></i> ' . $bodyMessage . '</a>
                      </div>
                    </div>
                  </div>';
          } else if ($bodyMessageType == 'emojy') {
            echo '<div class="right-messages common-margin">
                    <div class="right-msg-area">
                      <span class="date-time right-time">
                        1 day ago
                      </span>
                      <div class="right-files">
                        <img src="' . $bodyMessage . '" alt="" class="animated-emojy">
                      </div>
                    </div>
                  </div>';
          } else if ($bodyMessageType == 'xlsx' || $bodyMessageType == 'XLSX') {
            echo '<div class="right-messages common-margin">
                    <div class="right-msg-area">
                      <span class="date-time right-time">
                        1 day ago
                      </span>
                      <div class="right-files">
                        <a href="/assets/img/' . $bodyMessage . '"><i class="fas fa-file-excel word"></i> ' . $bodyMessage . '</a>
                      </div>
                    </div>
                  </div>';
          } else if ($bodyMessageType == 'docx' || $bodyMessageType == 'DOCX') {
            echo '<div class="right-messages common-margin">
                    <div class="right-msg-area">
                      <span class="date-time right-time">
                        1 day ago
                      </span>
                      <div class="right-files">
                        <a href="/assets/img/' . $bodyMessage . '"><i class="fas fa-file-word word"></i> ' . $bodyMessage . '</a>
                      </div>
                    </div>
                  </div>';
          } else if ($bodyMessageType == 'rtf' || $bodyMessageType == 'RTF') {

          } else if ($bodyMessageType == 'pptx' || $bodyMessageType == 'PPTX') {

          }

        } else {
          // left user's msg
          if ($bodyMessageType == 'text') {

          } else if ($bodyMessageType == 'jpg' || $bodyMessageType == 'JPG' || $bodyMessageType == 'JPEG' || $bodyMessageType == 'jpeg') {

          } else if ($bodyMessageType == 'png' || $bodyMessageType == 'PNG') {

          } else if ($bodyMessageType == 'zip' || $bodyMessageType == 'ZIP') {

          } else if ($bodyMessageType == 'pdf' || $bodyMessageType == 'PDF') {

          } else if ($bodyMessageType == 'emoji') {

          } else if ($bodyMessageType == 'xlsx' || $bodyMessageType == 'XLSX') {

          } else if ($bodyMessageType == 'docx' || $bodyMessageType == 'DOCX') {

          } else if ($bodyMessageType == 'rtf' || $bodyMessageType == 'RTF') {

          } else if ($bodyMessageType == 'pptx' || $bodyMessageType == 'PPTX') {

          }

        }

      }
    }


  }
}