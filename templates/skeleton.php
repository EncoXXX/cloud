<html>
<head>
  <?//Додаємо файли css
  foreach (CSS::getMinFiles() as $path) {
    ?><link rel="stylesheet" href="<?=$path?>"><?
  }
  ?>
</head>
<body>
  <?=View::getTemplate("templates/header.php");?>
  <?=View::getHtml();?>
  <?//Додаємо бібліотеки js
  foreach (JS::getLibs() as $lib) {
    ?><script src="<?=$lib?>"></script><?
  }?>
  <?//Додаємо файли js
  foreach (JS::getMinFiles() as $path) {
    ?><script src="<?=$path?>"></script><?
  }
  ?>
</body>
</html>
