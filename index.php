<?php
$method = $_SERVER['REQUEST_METHOD'];
if($method == "POST"){
  $requestBody = file_get_contents('php://input');
  $json = json_decode($requestBody);
  $text = $json->result->parameters->text;
  switch($text){
    case 'Hi':
    case 'hi':
    case 'hello':
      $speech = "Hi, Nice to meet you";
      break;
    case 'cashout':
    case 'cash out':
        $speech = "Cashout is avaialble for top markets in football";
        break;
    case 'tracker':
    case 'track':
        $speech = "You can track the major sports and top markets in Grid application";
        break;
    default:
       $speech = "Sorry, I didn't get you. Please visit https://thegrid.ladbrokes.com ";
       break;
  }
  $response = new \stdClass();
  $response->speech = $speech;
  $response->displayText = $speech;
  $response->source = "webhook";
  echo json_encode($response);
}else{
  echo "Method not allowed";
}
 ?>
