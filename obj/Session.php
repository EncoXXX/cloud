<?php
  //Requires classes DB and User
  class Session{

    public static function getKey(){
      if(!isset($_COOKIE["session_key"])){
        return false;
      }
      $session_key = $_COOKIE["session_key"];
      $link = DB::getLink();
      $query = "SELECT `id` FROM `sessions` WHERE `key`='$session_key'";
      $answer = mysqli_query($link, $query);
      if(mysqli_fetch_assoc($answer) == null){
        setcookie("session_key","",time()-3600);
        return false;
      }
      return $session_key;
    }

    public static function getId(){
      $session_key = self::getKey();
      if($session_key == false){
        return false;
      }
      $link = DB::getLink();
      $query = "SELECT `user_id` FROM `sessions` WHERE `key`='$session_key'";
      $answer = mysqli_query($link, $query);
      $answer = mysqli_fetch_assoc($answer);
      return $answer["user_id"];
    }

    public static function createKeyById($id = ""){
      $id = intval($id);
      if($id == 0){
        return false;
      }
      $user = User::getUserById($id);
      if($user === null){
        return false;
      }

      $link = DB::getLink();

      $key = "";
      $answer = 1;
      while($answer !== null){
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789!@#$%_-";
        $size = strlen($chars);
        $key = "";
        for($i = 0; $i < 128; $i++){
          $key .= $chars[rand(0,10000)%$size];
        }

        $query = "SELECT * FROM `sessions` WHERE `key` = '$key'";
        $answer = mysqli_query($link,$query);
        $answer = mysqli_fetch_assoc($answer);
      }
      $ip = $_SERVER["REMOTE_ADDR"];
      $time = time();

      $query = "INSERT INTO `sessions` (`user_id`,`key`,`ip`,`time`) VALUES ('$id','$key','$ip',$time)";
      $answer = mysqli_query($link,$query);
      setcookie("session_key",$key,time()+606024*30,"/");
      // header("Location: $_SERVER[REQUEST_URI]");
      return $key;
    }

    public static function getKeysById($id = ""){
      $id = intval($id);
      if($id == 0){
        return false;
      }
      $link = DB::getLink();
      $query = "SELECT * FROM `sessions` WHERE `user_id`='$id'";
      $answer = mysqli_query($link,$query);
      $answer = mysqli_fetch_all($answer,MYSQLI_ASSOC);
      if($answer == null){
        return false;
      }
      return $answer;
    }

    public static function removeKeyByKeyId($key_id = ""){
      $key_id = intval($key_id);
      if($key_id == 0){
        return false;
      }
      $link = DB::getLink();
      $query = "DELETE FROM `sessions` WHERE `id`='$key_id'";
      return mysqli_query($link, $query);
    }
  }
?>
