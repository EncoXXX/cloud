<?php

  if(!isset($_COOKIE["session_key"])){
    exit();
  }
  $link = DB::getLink();
  $session_key = $_COOKIE["session_key"];
  $query = "DELETE FROM `sessions` WHERE `session_key`='$session_key'";
  $answer = mysqli_query($link,$query);
  setcookie("session_key","",time()-3600);
  header("Location: /login");
?>
