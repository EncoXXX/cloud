<?php
  Router::includeController("files.php");
  $data = View::$data;
  // var_dump($data);
  View::setHead("<title>Файли</title>");
?>
<div class="wrapper">
  <div id="content">
    <div class="line"></div>
    <div class="contaner">
      <div class="row col-lg-12">
        <?foreach ($data["dirs"] as $dir) {?>
          <div class="card col-lg-3 col-xl-3 col-md-4 col-sm-6 element" >
            <a href = "<?=$dir["link"]?>" >
              <img class="card-img-top" src="/resource/img/folder.png"  alt="Card image cap">
            </a>
            <div class="card-body">
              <h5 class="card-title"><?=$dir["name"]?></h5>
            </div>
          </div><?
        }
        foreach ($data["files"] as $file) {?>
          <div class="card col-lg-3 col-xl-3 col-md-4 col-sm-6 element" >
            <a href = "<?=$file["link"]?>" >
              <img class="card-img-top" src="/resource/img/file.png"  alt="Card image cap">
            </a>
            <div class="card-body">
              <h5 class="card-title"><?=$file["name"]?></h5>
            </div>
          </div><?
        }?>
      </div>
    </div>
  </div>
</div>
