<?php
  class View{
    private static $html = "";
    private static $template_path = "templates/";

    public static $data = array();

    public static function setHtml($html){
      self::$html = $html;
    }
    public static function getHtml(){
      return self::$html;
    }

    public static function getTemplate($template = ""){
      if($template == ""){
        return "1";
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
        return "2)$template";
      }

      ob_start();
      include($template);
      return ob_get_clean();
    }
  }
?>
