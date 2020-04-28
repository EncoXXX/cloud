<?php
  class View{
    private static $html = "";
    private static $template_path = "templates/";
    private static $head = "";

    public static $data = array();

    public static function setHtml($html){
      self::$html = $html;
    }
    public static function getHtml(){
      return self::$html;
    }

    public static function getTemplate($template = ""){
      if($template == ""){
        return false;
      }
      if($template[0] != "/"){
        $template = "/$template";
        $template = $_SERVER["DOCUMENT_ROOT"].$template;
      }

      $is_file = false;
      if(file_exists($template)){
        if(is_file($template)){
          $is_file = true;
        }
      }

      if($is_file == false){
        return false;
      }

      ob_start();
      include($template);
      return ob_get_clean();
    }

    public static function setHead($head = ""){
      if($head == ""){
        return false;
      }
      self::$head = $head;
    }

    public static function getHead(){
      return self::$head;
    }
    
  }
?>
