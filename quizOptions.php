<?php
  $option_json = file_get_contents("quizOptions.json");
  $option_data = json_decode($option_json,true);
?>