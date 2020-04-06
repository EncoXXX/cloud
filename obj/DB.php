<?php
  class DB{
    private static $user = "AdmiN";
    private static $password = "KjKsZpJ";
    private static $host = "localhost";
    private static $db = "cpp";

    public static function getLink(){

      $user = self::$user;
      $password = self::$password;
      $host = self::$host;
      $db = self::$db;

      $link = mysqli_connect(self::$host, self::$user, self::$password, self::$db);
      if(mysqli_connect_error() !== null){
        return false;
      }
      mysqli_set_charset($link, "utf8");
      return $link;
    }

    public static function setUser($user = ""):bool{
      if($user == ""){
        return false;
      }
      self::$user = $user;
      return true;
    }

    public static function setPassword($password = ""):bool{
      self::$password = $password;
      return true;
    }

    public static function setHost($host = ""):bool{
      if($host == ""){
        return false;
      }
      self::$host = $host;
      return true;
    }

    public static function setDB($db = ""):bool{
      if($db == ""){
        return false;
      }
      self::$db = $db;
      return true;
    }
  }
?>
