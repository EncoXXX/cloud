<?php
  class Router{
    private static $is_404 = false;

    public static function is_404():bool{
      return self::$is_404;
    }

    public static function makeRoute():bool{
      $url = URL::getUrl();
      if($url == "/"){
        include($_SERVER["DOCUMENT_ROOT"]."/views/mainpage/index.php");
        return true;
      }
      $url_parts = URL::getUrlParts();
      $view = $url_parts[0];

      $path = $_SERVER["DOCUMENT_ROOT"]."/views/$view/index.php";
      if(file_exists($path)){
        if(is_file($path)){
          include($path);
          return true;
        }else{
          echo "<h1 align = \"center\">OOPS. Something went wrong:(</h1>";
          return false;
        }
      }
      $view = "404";
      self::$is_404 = true;
      $path = $_SERVER["DOCUMENT_ROOT"]."/views/$view/index.php";
      include($path);
      return true;
    }

    public static function includeModel($model):bool{
      $path = $_SERVER["DOCUMENT_ROOT"]."/models/$model";
      if(file_exists($path)){
        if(is_file($path)){
          include $path;
          return true;
        }
      }
      return false;
    }

    public static function includeController($controller):bool{
      $path = $_SERVER["DOCUMENT_ROOT"]."/controllers/$controller";
      if(file_exists($path)){
        if(is_file($path)){
          include $path;
          return true;
        }else{
          echo "Not a file";
        }
      }else{
        echo "Does not exists";
      }
      return false;
    }

    public static function set404page(){
      $view = "404";
      self::$is_404 = true;
      $path = $_SERVER["DOCUMENT_ROOT"]."/views/$view/index.php";
      include($path);
    }
  }
?>
