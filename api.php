<?php
function getRandomNumber(){
  $min = 9;
  $max = 32;
  return rand($min, $max);
}

// check for post
if (isset($_POST['value'])){
  $value = $_POST['value'];
  // lucky btn choose random category for url
  if ($value == "Feeling Lucky"){
    $category_no = getRandomNumber();
    error_log(print_r($value, true));

    // begin button add user chosen category to url
  } else if ($value == "Begin"){
    $category_no = $_POST['name'];
    error_log(print_r($category_no, true));
  } else {
    error_log("Oops something's gone wrong");
  }
}

// check $category_no != null
if (isset($category_no)){
  $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://opentdb.com/api.php?amount=10&category={$category_no}&type=boolean",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache"
      ),
    ));
    
    $response = curl_exec($curl);

    $err = curl_error($curl);
    
    curl_close($curl);

    $response = json_decode($response, true);
  
  // Send API Data to client side as answer & question arrays
  $answers = array();
  $questions = array();
  foreach ($response['results'] as $items)
  {
    $answers[] = $items['correct_answer'];
    $questions[] = $items['question'];

  }
}
 ?>