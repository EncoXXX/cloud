<?php
  /*
    Приклад того як потрібно додавати js або css
    Значок '~' означає що js буде братись з resource/js/ а css буде братись з resource/css
    Якщо css або js майже ніде не використовується то можна писати щось типу цього:
    JS::add("views/mainpage/some.js");

    Можна підключати бібліотеки, рекомендується підключати саме так:
    JS::addLib("шлях/до/бібліотеки");
    Тоді ти точно будеш впевнений що бібліотека буде вище в коді, за основний скрипт

    Якщо підключити бібліотеку чи скрипт потрібно глобально по всьому сайту
    то можеш зробити це в templates/skeleton.php, але вже через <script src="">
    або <link rel="stylesheet" href="">

    Щоб додавати сторінки на сайт - достатньо створити папку в views і створити там index.php
    Наприклад. Я створив папку login в папці views
    Далі я створив index.php в папці login
    Тепер при переході на cpp.server-user.info/login буде видавати не 404 сторінку а саме те що потрібно

    Папка mainpage стандартна)

    Але з підпапками не проканає. Наприклад якщо ти в папці login створиш папку admin
    і спробуєш перейти по cpp.server-user.info/login/admin то ти побачиш сторінку login,
    тобто те саме що cpp.server-user.info/login


  */
  Router::includeController("mainpage.php");
  JS::add("~test.js");
  JS::addLib("~test2.js");
  CSS::add("~test.css");
  CSS::add("~test2.css");
  $data = View::$data;
?>
