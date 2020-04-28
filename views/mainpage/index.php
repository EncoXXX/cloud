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

  $data = View::$data;
?>


    <title>Головна</title>

    <!-- Bootstrap CSS CDN -->
    <?php CSS::add("~/mainpage/mainpage.css"); ?>

    <!-- Our Custom CSS -->

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>
<div class="wrapper">
    <div id="content">
        <div class="line"></div>
            <div class="contaner">
               <div class="row col-lg-12">
                 <div class="card col-lg-3 col-xl-3 col-md-4 col-sm-6 element" >
                    <img class="card-img-top" src="\resource\img\folder.png"  alt="Card image cap">
                    <!-- <div class="image"></div> -->
                    <div class="card-body">
                       <h5 class="card-title">Folder Name</h5>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <?php JS::add("~/mainpage/jquery-3.3.1.slim.min.js"); ?>
    <?php JS::add("~/mainpage/mainpage.js"); ?>
</div>
</body>


