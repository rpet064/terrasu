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

$question_no = 0;
$current_score = 0;
while ($question_no < 10){
    $current_question = array($response['results'][$question_no]['question']);
    array_push($current_question, $response['results'][$question_no]['correct_answer'],$question_no, $current_score);
    $question_no++;
    if ($question_no < 10){
        print_r($current_question);
    } else {
        return 'Congratulat ions, you have completed the game. Refresh the page to play again';
    }
    
} 


// foreach ($response['results'] as $items)
// {
//     return $items['question'];
// }



    // foreach ($response['drinks'] as $key => $value) {
    //     echo $value, "\n";
    // }
 ?>