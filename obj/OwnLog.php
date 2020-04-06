<?php
  class OwnLog{
    private static $path = "site.log";

    //Notice  => 3
    //Warning => 2
    //Error   => 1
    private static $level = 3;
    public static function setPath($path = ""):bool{
      if($path == ""){
        return false;
      }
      if($path[0] != "/"){
        $path = $_SERVER["DOCUMENT_ROOT"]."/$path";
      }
      if(file_exists($path)){
        if(is_file($path)){
          if(is_writable($path)){
            self::$path = $path;
            return true;
          }else{
            self::Error("$path знайдена, але не встановлені права на запис");
          }
        }else{
          self::Error("Неможливо встановити $path як лог файл оскільки це папка.");
        }
      }else{
        //Створюєм файл, якщо його не існує
        $file = fopen($path,"w");
        if($file == false){
          self::Error("Не вдалося створити файл. Можливо немає доступу до директорії");
          return false;
        }else{
          self::$path = $path;
          fclose($file);
          return true;
        }
      }
    }

    public static function getPath():string{
      if($path[0]!="/"){
        return $_SERVER["DOCUMENT_ROOT"]."/$path";
      }
      return $path;
    }

    public static function setLogLevel($level = ""):bool{
      $date = date("d.m.Y H:i:s");
      if($level == ""){
        $method = __METHOD__;
        self::Error("$method не прийняла жодних аргументів");
        return false;
      }
      $level = strtolower(trim($level));
      if($level == "notice"){
        self::$level = 3;
        return true;
      }
      if($level == "warning"){
        self::$level = 2;
        return true;
      }
      if($level == "error"){
        self::$level = 1;
        return true;
      }
      $method = __METHOD__;
      self::Error("$method прийняла не вірні значення. Можливі значення: notice, warning, error. Ви ввели $level");
      return false;
    }

    public static function getLogLevel():int{
      return self::$level;
    }

    public static function Notice($text = ""):bool{
      if(self::$level < 3){
        return true;
      }
      $date = date("d.m.Y H:i:s");
      if($text == ""){
        echo "1";
        $text = "$date \nError\n".__METHOD__." не прийняла жодних аргументів\n\n";
        file_put_contents(self::$path,$text,FILE_APPEND);
        return false;
      }
      $text = "$date \nNotice\n$text\n\n";
      file_put_contents(self::$path,$text,FILE_APPEND);
      return true;
    }

    public static function Warning($text = ""):bool{
      if(self::$level < 2){
        return true;
      }
      $date = date("d.m.Y H:i:s");
      if($text == ""){
        $text = "$date \nError\n".__METHOD__." не прийняла жодних аргументів\n\n";
        file_put_contents(self::$path,$text,FILE_APPEND);
        return false;
      }
      $text = "$date \nWarning\n$text\n\n";
      file_put_contents(self::$path,$text,FILE_APPEND);
      return true;
    }

    public static function Error($text = ""):bool{
      if(self::$level < 1){
        return true;
      }
      $date = date("d.m.Y H:i:s");
      if($text == ""){
        $text = "$date \nError\n".__METHOD__." не прийняла жодних аргументів\n\n";
        file_put_contents(self::$path,$text,FILE_APPEND);
        return false;
      }
      $text = "$date \nError\n$text\n\n";
      file_put_contents(self::$path,$text,FILE_APPEND);
      return true;
    }
  }
?>
