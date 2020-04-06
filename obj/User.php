<?php
  class User{
    private static $id = 0;
    private static $name = "";
    private static $surname = "";
    private static $patronymic = "";
    private static $email = "";
    //При зміні структури таблиці потрібно міняти такі методи:
    //getUser() i setUserById($id);
    private static $db_table = "users";

    public static function getUser(){
      if(self::$id == 0){
        return false;
      }

      $user = array(
        "id" => self::$id,
        "name" => self::$name,
        "surname" => self::$surname,
        "patronymic" => self::$patronymic,
        "email" => self::$email
      );

      return $user;
    }

    public static function getUserById($id = ""){

      if($id == ""){
        return false;
      }
      $table = self::$db_table;
      $link = DB::getLink();

      $id = intval($id);

      if($id == 0){
        return false;
      }

      $query = "SELECT * FROM `$table` WHERE `id` = '$id'";
      $answer = mysqli_query($link, $query);
      $answer = mysqli_fetch_assoc($answer);

      return $answer;
    }

    public static function setUserById($id = ""):bool{
      if($id == ""){
        return false;
      }
      $id = intval($id);
      if($id == 0){
        return false;
      }

      $user = self::getUserById($id);

      if($user === null){
        return false;
      }


      self::$id = $user["id"];
      self::$name = $user["name"];
      self::$surname = $user["surname"];
      self::$patronymic = $user["patronymic"];
      self::$email = $user["email"];

      return true;
    }

    public static function getId(){
      if(self::$id == 0){
        return false;
      }
      return self::$id;
    }

    public static function getName(){
      if(self::$id == 0){
        return false;
      }
      return self::$name;
    }

    public static function getSurname(){
      if(self::$id == 0){
        return false;
      }
      return self::$surname;
    }

    public static function getPatronymic(){
      if(self::$id == 0){
        return false;
      }
      return self::$patronymic;
    }

    public static function getEmail(){
      if(self::$id == 0){
        return false;
      }
      return self::$email;
    }

    public static function getNameById($id = ""){
      if($id == ""){
        return false;
      }
      $id = intval($id);
      if($id == 0){
        return false;
      }
      $table = self::$db_table;

      $link = DB::getLink();
      $query = "SELECT `name` FROM `$table` WHERE `id` = $id";
      $answer = mysqli_query($link,$query);
      $answer = mysqli_fetch_assoc($answer);

      if($answer === null){
        return null;
      }

      return $answer["name"];
    }

    public static function getSurnameById($id = ""){
      if($id == ""){
        return false;
      }
      $id = intval($id);
      if($id == 0){
        return false;
      }
      $table = self::$db_table;

      $link = DB::getLink();
      $query = "SELECT `surname` FROM `$table` WHERE `id` = $id";
      $answer = mysqli_query($link,$query);
      $answer = mysqli_fetch_assoc($answer);

      if($answer === null){
        return null;
      }

      return $answer["surname"];
    }

    public static function getPatronymicById($id = ""){
      if($id == ""){
        return false;
      }
      $id = intval($id);
      if($id == 0){
        return false;
      }
      $table = self::$db_table;

      $link = DB::getLink();
      $query = "SELECT `patronymic` FROM `$table` WHERE `id` = $id";
      $answer = mysqli_query($link,$query);
      $answer = mysqli_fetch_assoc($answer);

      if($answer === null){
        return null;
      }

      return $answer["patronymic"];
    }

    public static function getEmailById($id = ""){
      if($id == ""){
        return false;
      }
      $id = intval($id);
      if($id == 0){
        return false;
      }
      $table = self::$db_table;

      $link = DB::getLink();
      $query = "SELECT `email` FROM `$table` WHERE `id` = $id";
      $answer = mysqli_query($link,$query);
      $answer = mysqli_fetch_assoc($answer);

      if($answer === null){
        return null;
      }

      return $answer["email"];
    }
  }
?>
