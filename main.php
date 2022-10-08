

<?php
$header = include('header.php');
?>
<div>
  <!-- stylesheet -->
<style><?php include('./css/styles.css'); ?></style>

<script type="text/javascript"> 
function checkfunction(obj){
  $.post("your_url.php",$(obj).serialize(),function(data){
   alert("success");
   });
   return false;
   }

</script>

<button>Click me </button>

<?php


ob_start();
$question_data = include('api.php');
ob_get_clean();
echo $question . ' True or False?';

session_start();


if (! isset($_SESSION["counter"]) ){
  $_SESSION["counter"] = 1;
  $_SESSION['score'] = 0;
  }

  if(
    isset($_POST['True'])) {
      ++$_SESSION['counter'];
      if ($answer == $_POST['True'] ){
        ++$_SESSION['score'];
      } else {
        echo 'Sorry that answer was False';
      }
  }
  if(
    isset($_POST['False'])) {
      ++$_SESSION['counter'];
      if ($answer == $_POST['False'] ){
        ++$_SESSION['score'];
      } else {
        echo 'Sorry that one was True';
      }
   }

   // reset counter
  if(isset($_POST['reset'])) {
   $_SESSION['counter'] = 1;
   $_SESSION['score'] = 0;
}
  ?>
  <br/><br/>
  <h3><?php echo 'Question ' . $_SESSION['counter']; ?></h3>
  <h3><?php echo 'Your Score is ' . $_SESSION['score']; ?></h3>
  <br/><br/>

  
  <form  onsubmit="return checkfunction(this)" method="post">
  <input class='true-btn' type="submit" name="True"
               value="True" onclick="return checkfunction(this)"/>
         
 <input class='false-btn'type="submit" name="False"
               value="False" onclick="return checkfunction(this)"/>

  <input class='reset-btn'type="submit" name="reset" value="Reset" onclick="return checkfunction(this)"/>
 </form>

</div>
<!-- stop page reload after form submission -->
<!-- <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script> -->
</body>
</html>
