<?php
  @$email = $_POST["email"];
  @$password = $_POST["password"];

  if(trim($email) == ""){
    echo "error";
    exit();
  }
  if(trim($password) == ""){
    echo "error";
    exit();
  }

  $link = DB::getLink();
  $query = "SELECT * FROM `users` WHERE `email`='$email'";
  $answer = mysqli_query($link,$query);

  $answer = mysqli_fetch_assoc($answer);
  if($answer == null){
    echo "error";
    exit();
  }

  if(password_verify($password,$answer["password"]) == false){
    echo "error";
    exit();
  }

  Session::createKeyById($answer["id"]);
  echo "ok";

?>
