<?php
function getRandomNumber(){
  $min = 9;
  $max = 32;
  return rand($min, $max);
}

$category_no = "";

// check for post
if (isset($_POST['categoryNo'])){
  $category_no = $_POST['categoryNo'];
  // lucky btn choose random category for url
  if ($category_no == ""){
    $category_no = getRandomNumber();
  }
}

error_log($category_no, true);

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