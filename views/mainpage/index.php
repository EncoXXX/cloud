<?php
  Router::includeController("mainpage.php");
  JS::add("~test.js");
  JS::add("~test2.js");
  CSS::add("~test.css");
  CSS::add("~test2.css");
  $data = View::$data;
?>
