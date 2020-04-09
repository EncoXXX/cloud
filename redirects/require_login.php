<?php
  $id = Session::getId();
  $url = URL::getUrl();
  if($id == false){
    if($url == "/login/"){
      return;
    }
    if($url == "/register/"){
      return;
    }
    header("Location: /login");
  }else{
    if($url == "/login/"){
      header("Location: /");
      exit();
    }
    if($url == "/register/"){
      header("Location: /");
      exit();
    }
    User::setUserById($id);
  }

?>
