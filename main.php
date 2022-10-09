

<?php
include('header.php');
include('navbar.php');
session_start();
$_SESSION["begin"] = true;
$_SESSION["header_1"] = null;
$_SESSION["header_2"] = null;
?>
  <!-- stylesheet -->
  <style><?php include('./css/styles.css'); ?></style>

  <!-- post data to sever -->
  <!-- <script type="text/javascript"> 
  function checkfunction(obj){
    $.post("your_url.php",$(obj).serialize(),function(data){
    alert("success");
    });
    return false;
    }
  </script> -->

  <!-- stop page reload after form submission -->
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<!-- main container component  -->
<div class='middle-container'>

<!-- handle api data -->
  <?php
  ob_start();
  $question_data = include('api.php');
  ob_get_clean();
  echo $question . ' True or False?';

    // reset score for a new session
  if (! isset($_POST["counter"]) ){
    $_SESSION["counter"] = 1;
    $_SESSION['score'] = 0;
    }

    // check if user True guess match correct answer
    if(
      isset($_POST['True'])) {
        ++$_SESSION['counter'];
        if ($answer == $_POST['True'] ){
          ++$_SESSION['score'];
        } else {
          echo 'Sorry that answer was False';
        }
    }

        // check if user False guess match correct answer
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

  if (! isset($_POST["begin"]) ){
    $_SESSION["begin"] = false;
    $_SESSION["header_1"] = 'Welcome to Terrasu, a PHP Geography Quiz Game';
    $_SESSION["header_2"] = 'Please press begin to start';
     }
  ?>

    <h1> <?=  $_SESSION["header_1"] ?> </h1>
    <h1> <?=  $_SESSION["header_2"] ?> </h1>

    <!-- background image -->
    <!-- <img src="https://picsum.photos/650/400" /> -->
    <!-- scoreboard -->
    <br/><br/>
    <h3><?=  'Question ' . $_SESSION['counter']; ?></h3>
    <h3><?= 'Your Score is ' . $_SESSION['score']; ?></h3>
    <br/><br/>

  <!-- form for user guess -->
  <form  onsubmit="return checkfunction(this)" method="post">

    <div>
      <input class='true-btn' type="submit" name="True"
                  value="True" onclick="return checkfunction(this)"/>
            
    <input class='false-btn'type="submit" name="False"
                  value="False" onclick="return checkfunction(this)"/>

      <input class='reset-btn' type="submit" name="reset" value="Reset" onclick="return checkfunction(this)"/>
  </div>
    <input class='begin-button' type="submit" name="begin" value="begin" onclick="return checkfunction(this)" /> 
  </form>
  </div>

<?php
$header = include('footer.php');
?>