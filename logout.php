<?php

  require_once 'functions.php';

  if( !isset($_SESSION['login']) ) {

    header('Location: login.php');

  }

  setcookie('id','', time() - 3600);
  setcookie('key','', time() - 3600);

  session_destroy();
  session_unset();
  $_SESSION = [];

  header('Location: login.php');

?>