<?php
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://opentdb.com/api.php?amount=10&category=22&type=boolean",
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
    // Send Api Data to client side

    
$answers = array();
$questions = array();
foreach ($response['results'] as $items)
{
  $answers[] = $items['correct_answer'];
  $questions[] = $items['question'];

}
 ?>