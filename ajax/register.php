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
  * error7 -> заборонені символи в полях ім'я або прізвище або по-батькові
  */


  if(strlen($password)<8){
    echo "error1";//Короткий пароль
    exit();
  }

  $password = password_hash($password,PASSWORD_DEFAULT);
  if($password == false){
    return"false";
  }

  if($name == ""){
    echo "error2";//Не введене ім'я
    exit();
  }

  if($surname == ""){
    echo "error3";//Не введене прізвище
    exit();
  }

  if($patronymic == ""){
    echo "error4";//Не введене по-батькові
    exit();
  }

  //Перевіряємо емейл по шаблону
  test_email($email);

  if($password == false){
    echo "error0";//Невідома помилка
    exit();
  }

  $link = DB::getLink();

  $query = "SELECT * FROM `users` WHERE `email`='$email'";
  $answer = mysqli_query($link,$query);
  $answer = mysqli_fetch_assoc($answer);

  if($answer !== null){
    echo "error6";//Користувач вже зареєстрований
    exit();
  }

  if(
    test_name($name)       == false or
    test_name($surname)    == false or
    test_name($patronymic) == false
  ){
    echo "error7";//Заборонені символи в полях ім'я або прізвище або по-батькові
    exit();
  }


  $query = "INSERT INTO `users`
  (`name`,`surname`,`patronymic`,`email`,`password`)
  VALUES
  ('$name','$surname','$patronymic','$email','$password');
  ";
  $answer = mysqli_query($link, $query);
  if($answer == false){
    echo "error0";//Проблема з БД
    exit();
  }

  $query = "SELECT `id` FROM `users` WHERE `email`='$email'";
  $answer = mysqli_query($link,$query);
  $answer = mysqli_fetch_assoc($answer);
  Session::createKeyById($answer["id"]);
  echo "ok";

  function test_email($email){
    //Перевіряємо чи є символ @ в емейлу
    if(strpos($email,"@") === false){
      echo "error5";
      exit();
    }

    $email = explode("@",$email);

    //Перевіряємо чи символ @  зустрічається лише один раз
    if(count($email)!=2){
      echo "error5";
      exit();
    }

    //Перевіряємо чи є символи перед @ та після нього
    if(strlen($email[0]) == 0 or strlen($email[1]) == 0){
      echo "error5";
      exit();
    }

    //Перевіряємо чи є крапка в рядку, який йде після символу @
    if(strpos($email[1],".") === false){
      echo "error5";
      exit();
    }

    //Перевіряємо чи крапка стоїть всередині а не вкінці чи на початку
    if($email[1][0] == "." or $email[0][strlen($email[0])-1] == "."){
      echo "error5";
      exit();
    }
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
