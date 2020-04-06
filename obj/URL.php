<?php
  class URL{
    static public function getUrl():string{
      $url = $_SERVER["REQUEST_URI"];
      if($url == ""){
        return "/";
      }
      $pos = strpos($url,"?");
      if($pos){
        $url = substr($url,0,$pos);
      }

      if($url[strlen($url)-1] != "/"){
        $url .= "/";
      }
      return $url;

    }

    static public function getUrlParts():array{
      $url = self::getUrl();
      if($url == "/"){
        return array("/");
      }
      //Видаляємо '/' в початку і в кінці строки
      $url = substr($url,1,strlen($url)-2);
      return explode("/",$url);
    }
  }
?>
