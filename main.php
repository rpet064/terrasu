<?=
include('header.php');
?>
<div>

<script type="text/javascript">
function checkfunction(obj){
  $.post("your_url.php",$(obj).serialize(),function(data){
   alert("success");
   });
   return false;
   }

</script>

<?php

use function PHPSTORM_META\type;

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
  ob_start();
  $question_data = include('api.php');
  ob_get_clean();
  echo $answer . $question;


  // $current_question =  isset($question_data['question']) ? $question_data['question'] : 0;
  // echo gettype($question_data);
  // echo ($question_data);
  // foreach ($question_data as $key=>$value)
  //       {
  //               echo "Key = $key <br>";
  //               echo "Value = $value <br>";
  //       }
?>
  
  <form  onsubmit="return checkfunction(this)" method="post">
  <input type="submit" name="button1"
               value="True" onclick="return checkfunction(this)"/>
         
 <input type="submit" name="button2"
               value="False" onclick="return checkfunction(this)"/>

  <input type="submit" name="reset" value="Reset" onclick="return checkfunction(this)"/>
 </form>

</div>
<!-- stop page reload after form submission -->
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>
