<?php
  @$action = $_POST["action"];
  $path = $_POST["path"];

  if($action == "createFile"){
    $answer = Data::createFile($path);
    if($answer == false){
      echo "fail";
      exit();
    }
    echo "ok";
    exit();
  }
  if($action == "removeFile"){
    $answer = Data::removeFile($path);
    if($answer == false){
      echo "fail";
      exit();
    }
    echo "ok";
    exit();
  }
  if($action == "createDir"){
    $answer = Data::createDir($path);
    if($answer == false){
      echo "fail";
      exit();
    }
    echo "ok";
    exit();
  }
  if($action == "removeDir"){
    $answer = Data::removeDir($path);
    if($answer == false){
      echo "fail";
      exit();
    }
    echo "ok";
    exit();
  }

  //Верне status code 404 якщо щось пішло не так
  if($action == "readFile"){
    $answer = Data::readFile($path);
    if($answer === false){
      exit();
    }
    echo $answer;
    exit();
  }

  echo "fail";
  exit();
?>
