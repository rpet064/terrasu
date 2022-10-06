<?=
include('header.php');
?>
<div>

<?=
 $current_question = include('api.php');
?>

<?php
session_start();

if (! isset($_SESSION["counter"]) ){
  $_SESSION["counter"] = 0;
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
   $_SESSION['counter'] = 0;
}
  ?>

  <form method="POST">
  <input type="submit" name="button1"
               value="True"/>
         
 <input type="submit" name="button2"
               value="False"/>

  <input type="submit" name="reset" value="Reset" />
  <br/><?php echo $_SESSION['counter']; ?>
 </form>

</div>
</body>
</html>
