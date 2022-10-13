<?php
function getRandomNumber(){
  $min = 9;
  $max = 32;
  return rand($min, $max);
}

// check for post
if (isset($_POST['name'])){
  $name = $_POST['name'];
  // lucky btn choose random category & add to url
  if ($name == "lucky-btn"){
    $ran_no = getRandomNumber();
    $url = "https://opentdb.com/api.php?amount=10&category={$ran_no}&type=boolean";
    error_log(print_r($name, true));
    error_log(print_r($url, true));
    // begin button add user chosen category to url
  } else if ($name == "begin-btn"){
    $category_no = $_POST['value'];
    $url = "https://opentdb.com/api.php?amount=10&category={$category_no}&type=boolean";
    error_log(print_r($category_no, true));
    error_log(print_r($url, true));
  } else {
    error_log("Oops something's gone wrong");
  }
}



  
  // $curl = curl_init();

  //   curl_setopt_array($curl, array(
  //     CURLOPT_URL => "https://opentdb.com/api.php?amount=10&category=22&type=boolean",
  //     CURLOPT_RETURNTRANSFER => true,
  //     CURLOPT_TIMEOUT => 30,
  //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  //     CURLOPT_CUSTOMREQUEST => "GET",
  //     CURLOPT_HTTPHEADER => array(
  //       "cache-control: no-cache"
  //     ),
  //   ));
    
  //   $response = curl_exec($curl);

  //   $err = curl_error($curl);
    
  //   curl_close($curl);

  //   $response = json_decode($response, true);
  
  // // Send API Data to client side as answer & question arrays
  // $answers = array();
  // $questions = array();
  // foreach ($response['results'] as $items)
  // {
  //   $answers[] = $items['correct_answer'];
  //   $questions[] = $items['question'];

  // }
 ?>