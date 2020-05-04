<?php
  $url = URL::getUrl();
  //Вирізаємо /files з url на початку
  $url = substr($url,6);
  // var_dump(Data::removeFile("file11.txt"));
  $data = Data::readDir($url);

  View::$data = $data;
?>
