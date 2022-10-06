<?=
include('header.php');
?>
<div>



<?php

session_start();

if (! isset($_SESSION["counter"]) ){
  $_SESSION["counter"] = 1;
  }

  if(
    isset($_POST['button1'])) {
      ++$_SESSION['counter'];
  }
  if(
    isset($_POST['button2'])) {
      ++$_SESSION['counter'];
   }

   // reset counter
  if(isset($_POST['reset'])) {
   $_SESSION['counter'] = 1;
}
  ?>
  <br/><br/>
  <?php echo 'Question ' . $_SESSION['counter']; ?>
  <br/><br/>

<?=

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
  foreach ($response['results'] as $items)
  {
  var_dump($items['question']);
  }
?>
  
  <form method="POST">
  <input type="submit" name="button1"
               value="True"/>
         
 <input type="submit" name="button2"
               value="False"/>

  <input type="submit" name="reset" value="Reset" />
 </form>

</div>
</body>
</html>
