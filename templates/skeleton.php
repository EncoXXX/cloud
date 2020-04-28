<html>
<head>
<link href="/resource/css/jquery-ui.min.css" rel="stylesheet">
<link href="/resource/css/bootstrap.min.css" rel="stylesheet">
<!-- <link href="/resource/css/pkm/pkm.css" rel="stylesheet"> -->
  <?//Додаємо файли css
  foreach (CSS::getMinFiles() as $path) {
    ?><link rel="stylesheet" href="/<?=$path?>"><?
  }
  ?>

  <?//Додаємо head ?>
  <?=View::getHead();?>
</head>
<body>
  <?=View::getTemplate("templates/header.php");?>
  <?=View::getHtml();?>
  <!-- <script src="/resource/js/pkm/pkm.js"></script> -->
  <script src="/resource/js/external/jquery/jquery.js"></script>
  <script src="/resource/js/jquery-ui.js"></script>
  <script src="/resource/js/bootstrap.min.js"></script>
  <?//Додаємо бібліотеки js
  foreach (JS::getLibs() as $lib) {
    ?><script src="/<?=$lib?>"></script><?
  }?>
  <?//Додаємо файли js
  foreach (JS::getMinFiles() as $path) {
    ?><script src="/<?=$path?>"></script><?
  }
  ?>

</body>
</html>
