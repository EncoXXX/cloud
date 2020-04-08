<?php
  //Додаємо бібліотеку для стиснення js та css
  include("minify/src/Minify.php");
  include("minify/src/CSS.php");
  include("minify/src/JS.php");
  include("minify/src/ConverterInterface.php");
  include("minify/src/Converter.php");
  include("minify/src/NoConverter.php");
  include("minify/src/Exception.php");

  include("obj/JS.php");

  include("obj/CSS.php");

  include("obj/OwnLog.php");
  include("settings/ownlog.php");

  include("obj/DB.php");

  include("obj/User.php");

  include("obj/Session.php");

  include("obj/URL.php");

  include("obj/View.php");

  include("obj/Router.php");

  //Перенаправляє всі запити якщо користувач не ввійшов
  include("require_login.php");

  ob_start();
  Router::makeRoute();
  View::setHtml(ob_get_clean());

  JS::complete();
  CSS::complete();
  include("templates/skeleton.php");

  file_put_contents("site.log",time()."\n",FILE_APPEND);
?>
