<?php
  class JS{
    private static $js_files = array();
    private static $js_libs = array();
    private static $min_files = array();
    private static $default_path = "resource/js";

    public static function add($path = ""){
      if($path == ""){
        return false;
      }

      //Нормалізуємо шлях
      if($path[0] == "~"){
        $path = substr($path,1);
        if($path[0] != "/"){
          $path = "/$path";
        }
        $path = self::$default_path.$path;
      }

      // return $path;
      //Перевіряємо чи існує такий файл
      $is_file = false;
      if(file_exists($path)){
        if(is_file($path)){
          $is_file = true;
        }
      }

      if($is_file == false){
        return false;
      }

      $dot_pos = strrpos($path,".");
      $length = strlen($path) - (strlen($path) - $dot_pos);
      $file_path = substr($path,0,$length);
      $extention = substr($path, $dot_pos);

      $min_file = "{$file_path}_min{$extention}";

      self::$min_files[$path] = $min_file;
      self::$js_files[] = $path;

      return true;
    }

    public static function addLib($path = ""){

        if($path == ""){
          return false;
        }

        //Нормалізуємо шлях
        if($path[0] == "~"){
          $path = substr($path,1);
          if($path[0] != "/"){
            $path = "/$path";
          }
          $path = self::$default_path.$path;
        }

        // return $path;
        //Перевіряємо чи існує такий файл
        $is_file = false;
        if(file_exists($path)){
          if(is_file($path)){
            $is_file = true;
          }
        }

        if($is_file == false){
          return false;
        }
        self::$js_libs[] = $path;
        return true;
    }

    public static function complete(){
      foreach(self::$js_files as $file){
        $minifier = new MatthiasMullie\Minify\JS($file);
        $path_to_min = self::$min_files[$file];

        if(!file_exists($path_to_min)){
          file_put_contents($path_to_min,"");
        }
        $minifier -> minify($path_to_min);
      }
    }

    public static function getFiles(){
      return self::$js_files;
    }

    public static function getLibs(){
      return self::$js_libs;
    }

    public static function getMinFiles(){
      return self::$min_files;
    }
  }
?>
