<?php
  session_start();
  $varName = $_POST['varName'];
  $varValue = $_POST['varValue'];

  $_SESSION[$varName] = $varValue;

  if(isset($_SESSION[$varName])) {
    echo json_encode(array('success' => true));
  } else {
    echo json_encode(array('success' => false));
  }