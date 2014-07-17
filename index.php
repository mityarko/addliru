<?php
    header('Content-Type: text/html; charset=utf-8'); 
?>
<html>
<head>
	<title>Массовое добавление счетчика Liveinternet</title>
	<link rel="stylesheet" type="text/css" href="core/main.css" />
</head>
<body bgcolor="bfddee"><div id="main">
	<div id="main_head" class="float">Всем по счетчику!</div>
	<div class="scribe_big"> Я угощаю...</div>
	<div class="padding-20 scribe">
<?php 
if (isset($_REQUEST['submit'])) {
	require_once "core/lib/addliru.php";
	$mail = trim($_REQUEST['mail']);
	$pass = trim($_REQUEST['pass']);
	$sites = array_map('trim', explode(chr(10), $_REQUEST['sites']));
	foreach ($sites as $k=>$v) $sites[$k] = str_replace('http://', '', $v);
	foreach ($sites as $url) {
		echo "Добавляем $url... ";
		addliru($url, $pass, $mail);
		echo "ОК<br>";
	}
	echo "<br><b>Готово =)</b>";
} else { ?>
	<form action="" method="POST">
		<input type="text" name="mail"> &larr; Мыло<br><br>
		<input type="text" name="pass"> &larr; Пароль (для счетчика)<br><br>
		Сайты (вида site.ru) &darr;<br>
		<textarea name="sites" rows="10" cols="45"></textarea> <br><br>
		<input type="submit" name="submit" value="Регистрировать">
	</form>
<?php } ?>
		<br><br>
		<div style="text-align: center;"><a href="http://teimos.ru/">&copy;2010 teimos.ru</a></div>
	</div>
</div>
</body>
</html>