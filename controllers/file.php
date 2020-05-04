<?php
  $url = URL::getUrl();
  //Вирізаємо /file з url на початку
  $url = substr($url,5);
  // var_dump(Data::removeFile("file11.txt"));
  $data["content"] = Data::readFile($url);
  if($data["content"] === false){
    $data["content"] = "404 error((";
  }

  $url = URL::getUrl();

  $count = 1;
  $url = str_replace("/file/","/files/",$url,$count);
  $back_url = substr($url,0,strlen($url) - 1);

  if($back_url != "/files"){
    $pos = strrpos($back_url,"/");
    $back_url = substr($back_url,0,$pos);
  }
  $data["back_url"] = $back_url;
  View::$data = $data;

?>
