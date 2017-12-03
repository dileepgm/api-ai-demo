<?php

$method = $_SERVER['REQUEST_METHOD'];

if($method == "POST"){
  $requestBody = file_get_contents('php://input');
  $json = json_decode($requestBody);
  $text = $json->result->parameters-text;

  switch($text){
    case 'hi':
      $speech = "Hi, Nice to meet you";
      break;
    case 'bye':
        $speech = "Bye, have a good day";
        break;
    case 'anything':
        $speech = "Type anything to get reply";
        break;
    default:
       $speech = "Sorry, I didn't get you ";
       break;
  }

  $response = new \stdClass();
  $response->speech = "";
  $response->displayText = "";
  $response->source = "webhook";
  echo json_encode($response);
}else{
  echo "Method not allowed";
}

 ?>
