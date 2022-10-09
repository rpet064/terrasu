

<?php
include('header.php');
include('navbar.php');
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
  session_start();

    // begin session
    if (! isset($_SESSION["begin"]) ){
      $_SESSION["begin"] = True;
      echo $_SESSION["begin"];
      }

    // reset score for a new session
  if (! isset($_SESSION["counter"]) ){
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
    ?>

<?php if ($_SESSION["begin"] != True){ ?>
    <div>
    <h1>Welcome to Terrasu, a PHP Geography Quiz Game</h1>
    <h1>There are ten questions. Are you ready?</h1>
  </div>
  <?php } else { ?>
    <h1>let's Begin</h1>
    <?php } ?>

  <!-- background image -->
  <img src="https://picsum.photos/400/600" />

  <!-- scoreboard -->
    <br/><br/>
    <h3><?php echo 'Question ' . $_SESSION['counter']; ?></h3>
    <h3><?php echo 'Your Score is ' . $_SESSION['score']; ?></h3>
    <br/><br/>

  <!-- form for user guess -->
  <form  onsubmit="return checkfunction(this)" method="post">

  <?php if ($_SESSION["begin"] == True){ ?>
    <div>
      <input class='true-btn' type="submit" name="True"
                  value="True" onclick="return checkfunction(this)"/>
            
    <input class='false-btn'type="submit" name="False"
                  value="False" onclick="return checkfunction(this)"/>

      <input class='reset-btn' type="submit" name="reset" value="Reset" onclick="return checkfunction(this)"/>
  </div>
  <?php } else { ?>
    <input class='begin-button' type="submit" name="begin" value="begin" onclick="return checkfunction(this)" />
    <?php } ?>
  </form>

  </div>

<?php
$header = include('footer.php');
?>