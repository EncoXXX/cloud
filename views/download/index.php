<?php
  // $url = URL::getUrl();
  // //Вирізаємо /download з url на початку
  // $url = substr($url,9);
  // $file = Data::readFile($url);
  // if($file === false){
  //   exit();
  // }
  // //Перевіряємо чи є "/" на кінці і видаляємо
  echo "<br><br><br><br>".Data::getNameByUrl("two.txt");
?>
