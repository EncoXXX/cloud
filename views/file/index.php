<?php
  Router::includeController("file.php");
  $data = View::$data;
  // var_dump($data);
?>
<div class = "catalog">
  <a href="<?=$data["back_url"];?>">Назад</a>
</div>
<div class = "catalog">
  <xmp>
  <?=$data["content"]?>
  </xmp>
</div>
<style>
  .catalog{
    margin-left: 100px;
  }
</style>
