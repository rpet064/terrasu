<?=
include('header.php');
?>
<div>

<?=
 $current_question = include('api.php')[0];
?>

<?php
      if(
        isset(
          $_POST['button1'])) {
          echo "You guessed True";
      }
      if(
        isset(
          $_POST['button2'])) {
          echo "You guessed False";
      }
  ?>

  <form method="post">
  <input type="submit" name="button1"
               value="True"/>
         
 <input type="submit" name="button2"
               value="False"/>
 </form>

</div>
</body>
</html>
