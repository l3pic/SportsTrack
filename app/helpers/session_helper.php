<?php
  session_start();

  function isLoggedIn() {
    if(isset($_SESSION['user_id'])) {
      return true;
    } else {
      return false;
    }
  }

  function checkSessionVar($varName) {
    if(isset($_SESSION[$varName])) {
      return 1;
    } else {
      return 0;
    }
  }