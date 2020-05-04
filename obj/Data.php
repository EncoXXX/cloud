<?php
  class Data{
    public static function readDir($path = "/"){
      //Для подальшого виведення кнопки назад
      $is_root = false;
      if($path == "/"){
        $is_root = true;
      }
      $id = User::getId();
      if($id === false){
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
        return false;
      }

      $path = self::getBaseDir($id).$path;
      if(!file_exists($path)){
        return false;
      }
      if(!is_dir($path)){
        return false;
      }

      $dir = scandir($path);
      $temp_dir = array_diff(scandir($path),array(".",".."));
      $dir = array(
        "dirs"  => array(),
        "files" => array()
      );
      $i = 0;
      $url = URL::getUrl();
      //Перевіряємо чи не корінь, якщо ні, то додати кнопку назад
      if(!$is_root){
        $back_url = substr($url,0,strlen($url) - 1);
        $pos = strrpos($back_url,"/");

        $back_url = substr($url,0,$pos);

        $dir["dirs"][$i]["name"] = "Назад";
        $dir["dirs"][$i]["type"] = "dir";
        $dir["dirs"][$i]["link"] = $back_url;
        $i++;
      }
      //Заповняємо спочатку директоріями
      foreach($temp_dir as $file){
        if(is_dir($path.$file)){
          $dir["dirs"][$i]["name"] = $file;
          $dir["dirs"][$i]["type"] = "dir";
          $dir["dirs"][$i]["link"] = $url.$file;
        }
        $i++;
      }
      //Заповняємо файлами
      $i = 0;
      $count = 1;
      $url = str_replace("/files/","/file/",$url,$count);
      foreach($temp_dir as $file){
        if(!is_dir($path.$file)){
          $dir["files"][$i]["name"] = $file;
          $dir["files"][$i]["type"] = "file";
          $dir["files"][$i]["link"] = $url.$file;
        }
        $i++;
      }
      return $dir;
    }

    public static function readFile($file = ""){
      if(trim($file == "")){
        return false;
      }

      if($file[0] != "/"){
        $file = "/$file";
      }

      if($file[strlen($file) - 1] == "/"){
        $file = substr($file,0,strlen($file) - 1);
      }

      $path = self::getBaseDir(User::getId()).$file;

      $file_exists = false;

      if(file_exists($path)){
        if(is_file($path)){
          $file_exists = true;
        }
      }

      if($file_exists == false){
        return false;
      }

      if(is_readable($path) == false){
        return false;
      }
      return file_get_contents($path);
    }

    public static function createBaseDir($id = 0){
      $id = intval($id);
      if($id == 0){
        return false;
      }
      $path = self::getBaseDir($id);
      if(file_exists($path)){
        if(is_dir($path)){
          return false;
        }
      }

      mkdir($path, 0755);
    }

    public static function getBaseDir($id = 0){
      $id = intval($id);
      if($id == 0){
        return false;
      }
      $path = $_SERVER["DOCUMENT_ROOT"]."../data/$id";
      return $path;
    }

    public static function createDir($path = ""){
      if(trim($path) == ""){
        return false;
      }
      if($path[0] != "/"){
        $path = "/$path";
      }
      if($path[strlen($path) - 1] != "/"){
        $path = "$path/";
      }

      $path = self::getBaseDir(User::getId()).$path;
      if(file_exists($path)){
        if(is_dir($path)){
          return false;
        }
      }
      $created = mkdir($path, 0755);

      return $created;
    }

    public static function removeDir($path = ""){
      if(trim($path) == ""){
        return false;
      }
      if($path[0] != "/"){
        $path = "/$path";
      }
      if($path[strlen($path) - 1] != "/"){
        $path = "$path/";
      }

      $path = self::getBaseDir(User::getId()).$path;
      $dir_exists = false;
      if(file_exists($path)){
        if(is_dir($path)){
          $dir_exists = true;
        }
      }

      if($dir_exists == false){
        return false;
      }

      rmdir($path);
      return true;
    }

    public static function createFile($file = ""){
      if(trim($file == "")){
        return false;
      }

      if($file[0] != "/"){
        $file = "/$file";
      }

      if($file[strlen($file) - 1] == "/"){
        $file = substr($file,0,strlen($file) - 1);
      }

      $path = self::getBaseDir(User::getId()).$file;

      if(file_exists($file)){
        if(is_file($file)){
          return false;
        }
      }

      $writed = file_put_contents($path,"");
      if($writed === false){
        return false;
      }
      chmod($path, 0755);
      return true;
    }

    public static function removeFile($file = ""){
      if(trim($file == "")){
        return false;
      }

      if($file[0] != "/"){
        $file = "/$file";
      }

      if($file[strlen($file) - 1] == "/"){
        $file = substr($file,0,strlen($file) - 1);
      }

      $path = self::getBaseDir(User::getId()).$file;

      $file_exists = false;

      if(file_exists($path)){
        if(is_file($path)){
          $file_exists = true;
        }
      }

      if($file_exists == false){
        return false;
      }

      if(is_writable($path) == false){
        return false;
      }

      unlink($path);
      return true;
    }

    public static function getNameByUrl($url = ""){
      if(trim($url) == ""){
        return false;
      }
      if($url == "/"){
        return "file_".time();
      }
      $path = self::getBaseDir(User::getId())."/".$url;

      if($path[strlen($path)-1] == "/"){
        $path = substr($path,0,strlen($path) - 1);
      }

      $last_pos = strrpos($path,"/");
      if($last_pos == false){
        return $path;
      }

      $file_name = substr($path,$last_pos + 1);
      return $file_name;
    }

  }
?>
