<?php
  session_start();
  $varName = $_POST['varName'];
  $varValue = $_POST['varValue'];

  $_SESSION[$varName] = $varValue;
