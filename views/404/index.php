<?
Router::includeController("404page.php");
$data = View::$data;
$head = <<<HTML
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Сторінка не знайдена</title>
HTML;

View::setHead($head);
?>

<?php CSS::add("~/404/font.css"); ?>
<?php CSS::add("~/404/style.css"); ?>

<div id="notfound">
	<div class="notfound">
		<div class="notfound-404">
			<h1>4<span></span>4</h1>
		</div>
		<h2>Упссс! Сторінку Не Знайдено</h2>
    <p>Вибачте, але сторінка "<?=$data["url"]?>" не існує. Можливо вона була переміщена або видалена</p>
		<a href="/">Назад на головну</a>
	</div>
</div>
