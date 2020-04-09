<?php
$url_parts = URL::getUrlParts();
$view = $url_parts[0];
//Перевірка чи це ajax
$path = "";
if($view == "ajax"){
  foreach($url_parts as $part){
    $path.="$part/";
  }
  //Видаляємо символ / вкінці
  $path = substr($path,0,strlen($path)-1);
  if(file_exists($path)){
    if(is_file($path)){
      include($path);
      exit();
    }
  }
}
?>
