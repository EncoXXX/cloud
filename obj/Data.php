<?php
  class Data{
    public static function getDir($path = "/"){
      $id = User::getId();
      if($id === false){
        echo 1;
        return false;
      }
      //Треба забезпечити захист від переходу на директорію вище
      //Нормалізуємо строку
      if($path[0]!="/"){
        $path = "/$path";
      }
      if($path[strlen($path) - 1] != "/"){
        $path = "$path/";
      }
      //Забороняємо перехід на каталог вище
      if(strpos($path, "/../") !== false){
        echo 2;
        return false;
      }

      $path = $_SERVER["DOCUMENT_ROOT"]."../data/$id".$path;
      if(!file_exists($path)){
        echo 3;
        return false;
      }
      if(!is_dir($path)){
        echo 4;
        return false;
      }

      $dir = scandir($path);
      $temp_dir = array_diff(scandir($path),array(".",".."));
      $dir = array(
        "dirs" => array(),
        "files" => array()
      );
      foreach($temp_dir as $file){
        if(is_dir($path.$file)){
          $dir["dirs"][] = $file;
        }else{
          $dir["files"][] = $file;
        }
      }
      return $dir;
    }
  }
?>
