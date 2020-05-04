<?php
  // $_POST["name"] = "Андрій";
  // $_POST["surname"] = "Беднарський";
  // $_POST["patronymic"] = "Олександрович";
  // $_POST["email"] = "16@1.com";
  // $_POST["password"] = "";

  @$name = trim($_POST["name"]);
  @$surname = trim($_POST["surname"]);
  @$patronymic = trim($_POST["patronymic"]);
  @$email = trim($_POST["email"]);
  @$password = $_POST["password"];
  $errors = array();
  /*
  * ------------------------
  * Список помилок
  * ------------------------
  * error0 -> невідома помилка
  * error1 -> короткий пароль
  * error2 -> не введене ім'я
  * error3 -> не введене прізвище
  * error4 -> не введене по-батькові
  * error5 -> не вірний формат емейл
  * error6 -> користувач вже зареєстрований
  * error7 -> заборонені символи в полі ім'я
  * error8 -> заборонені символи в полі прізвище
  * error9 -> заборонені символи в полі по-батькові
  */

  //Перевіряємо чи пароль має хоча б 8 символів
  if(strlen($password)<8){
    $errors[] = "error1";
  }

  $password = password_hash($password,PASSWORD_DEFAULT);
  //Перевіряємо чи не було помилки при хешуванні пароля
  if($password == false){
    $errors[] = "error0";
  }

  if($name == ""){
    $errors[] = "error2";//Не введене ім'я
  }

  if($surname == ""){
    $errors[] = "error3";//Не введене прізвище
  }

  if($patronymic == ""){
    $errors[] = "error4";//Не введене по-батькові
  }

  //Перевіряємо емейл по шаблону
  if(test_email($email) == false){
    $errors[] = "error5";
  }



  $link = DB::getLink();

  $query = "SELECT * FROM `users` WHERE `email`='$email'";
  $answer = mysqli_query($link,$query);
  $answer = mysqli_fetch_assoc($answer);

  if($answer !== null){
    $errors[] = "error6";//Користувач вже зареєстрований
  }

  //Перевіряє ім'я на заборонені символи
  if(test_name($name) == false){
    $errors[] = "error7";
  }
  //Перевіряє прізвище на заборонені символи
  if(test_name($surname) == false){
    $errors[] = "error8";
  }
  //Перевіряє по-батькові на заборонені символи
  if(test_name($patronymic) == false){
    $errors[] = "error9";
  }

  //Якщо є помилки - виводимо і припиняємо роботу скрипта
  if(count($errors) > 0){
    $error_string = "";
    foreach($errors as $error){
      $error_string .= "$error-";
    }
    //Видаляємо останній символ "-" в стрічці з помилками
    $error_string = substr($error_string,0,strlen($error_string) - 1);
    echo $error_string;
    exit();
  }

  $query = "INSERT INTO `users`
  (`name`,`surname`,`patronymic`,`email`,`password`)
  VALUES
  ('$name','$surname','$patronymic','$email','$password');
  ";
  $answer = mysqli_query($link, $query);

  $query = "SELECT `id` FROM `users` WHERE `email`='$email'";
  $answer = mysqli_query($link,$query);
  $answer = mysqli_fetch_assoc($answer);
  Session::createKeyById($answer["id"]);
  Data::createBaseDir($answer["id"]);
  echo "ok";

  function test_email($email){
    //Перевіряємо чи є символ @ в емейлу
    if(strpos($email,"@") === false){
      return false;
    }

    $email = explode("@",$email);

    //Перевіряємо чи символ @  зустрічається лише один раз
    if(count($email)!=2){
      return false;
    }

    //Перевіряємо чи є символи перед @ та після нього
    if(strlen($email[0]) == 0 or strlen($email[1]) == 0){
      return false;
    }

    //Перевіряємо чи є крапка в рядку, який йде після символу @
    if(strpos($email[1],".") === false){
      return false;
    }

    //Перевіряємо чи крапка стоїть всередині а не вкінці чи на початку
    if($email[1][0] == "." or $email[0][strlen($email[0])-1] == "."){
      return false;
    }
    return true;
  }

  function test_name($name){
    $denied_chars = array(
      "." , "\"", "," , ":" , "/" , "|" , "{" , " " ,
      "}" , "[" , "]" , "!" , "@" , "#" , '$' , "%" ,
      "^" , "*" , "(" , ")" , ";" , "?" , "+" , "=" ,
      "`" , "\\", "<" , ">" , "№" , "~"
    );
    for($i = 0; $i<strlen($name); $i++){
      if(in_array($name[$i], $denied_chars)){
        return false;
      }
    }
    return true;
  }
?>
