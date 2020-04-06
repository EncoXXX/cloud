<?php

  include("obj/OwnLog.php");
  include("settings/ownlog.php");

  include("obj/DB.php");

  include("obj/User.php");

  include("obj/Session.php");

  include("obj/URL.php");

  include("obj/View.php");

  include("obj/Router.php");
  include("settings/routes.php");

  Router::makeRoute();

  // file_put_contents("test.log",time()."\n",FILE_APPEND);
?>
