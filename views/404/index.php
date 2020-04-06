<?
Router::includeController("404page.php");
$data = View::$data;
?>

<p align = "center" style="margin-top:40vh">Server-User.info повідомляє<br>Запитувана сторінка <?=$data["url"]?> не знайдена</p>
