<?php

 /*
 *  Ці стрічки додані для того щоб ігнорувати header для
 *  login, register, 404.
 */

 $url = URL::getUrlParts()[0];
 if(
  $url == "register" or
  $url == "login" or
  Router::is_404()
 ){
  return;
 }
?>
<link href="/resource/css/mainpage/mainpage.css" rel="stylesheet">
        <!-- Sidebar Holder -->
        <nav  id="sidebar">
            <div class="sidebar-header">
                <h3>Super Cloud</h3>
            </div>


            <ul class="list-unstyled components">
                <!-- <p>Dummy Heading</p> -->
                <li>
                  <a href="/">Головна</a>
                </li>
                <li>
                    <a href="/files/">Файли</a>
                </li>
                <li>
                    <a href="#">Some sho to tam</a>
                </li>
                <li class="active">
                  <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Some sho to tam</a>
                </li>
                <li>
                  <a href="#">Some sho to tam</a>
                  <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Some sho to tam</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div class="header_main">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                   <div id="move_btn">
                    <button  type="button" id="sidebarCollapse" class="navbar-btn ">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    </div>
                    <!-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button> -->
                    <div class="collapse navbar-collapse" >
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                              <a class="nav-link">Привіт, <?=User::getName();?></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="/ajax/logout.php" action="logout">Вийти</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <?php JS::add("~/mainpage/jquery-3.3.1.slim.min.js"); ?>
        <?php JS::add("~/mainpage/mainpage.js"); ?>




        <!-- <menu class="menu">
            <li class="menu-item">
                <button type="button" class="menu-btn">
                    <i class="fa fa-folder-open"></i>
                        <span class="menu-text">Відкрити</span>
                </button>
            </li>
            <li class="menu-item disabled">
                <button type="button" class="menu-btn">
                    <span class="menu-text">Відкрити в новій вкладці</span>
                </button>
            </li>
            <li class="menu-separator"></li>
                <li class="menu-item">
                <button type="button" class="menu-btn">
                   <i class="fa fa-reply"></i>
                        <span class="menu-text">Обновити</span>
                </button>
            </li>
            <li class="menu-separator"></li>
                <li class="menu-item">
                    <button type="button" class="menu-btn">
                        <i class="fa fa-download"></i>
                            <span class="menu-text">Зберегти</span>
                    </button>
                </li>
                <li class="menu-item">
                    <button type="button" class="menu-btn">
                        <i class="fa fa-edit"></i>
                            <span class="menu-text">Змінити</span>
                    </button>
                </li>
                <li class="menu-item">
                    <button type="button" class="menu-btn">
                        <i class="fa fa-trash"></i>
                            <span class="menu-text">Видалити</span>
                    </button>
                </li>
        </menu> -->
