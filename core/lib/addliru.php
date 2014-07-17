<?php
set_time_limit(0);
function addliru($url, $pass="pass", $mail="mail@mail.ru") {
	$ch = curl_init(); // »нициализируем сессию	
	curl_setopt($ch, CURLOPT_URL, 'http://www.liveinternet.ru/add'); // задаем адрес формы
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // –езультат нам нужно вернуть в переменную, а не на экран
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // ѕереходить по редиректам
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.0.3) Gecko/2008092417 Firefox/3.0.3 YB/3.5.3'); 
	curl_setopt($ch, CURLOPT_COOKIESESSION, 1); 
	curl_setopt($ch, CURLOPT_POST, 1); // ”казываем, что нам нужно отправить POST-запрос
	curl_setopt($ch, CURLOPT_COOKIEJAR, $_SERVER['DOCUMENT_ROOT'].'/cookies.txt'); // ”казываем файл дл€ хранени€ кукисов	
	curl_setopt($ch, CURLOPT_COOKIEFILE, $_SERVER['DOCUMENT_ROOT'].'/cookies.txt'); // ”казываем файл дл€ хранени€ кукисов	
	$post = array(
		'rules' => 'agreed',
		'type' => 'site',
		'nick' => $url,
		'url' => 'http://'.$url,
		'name' => $url,
		'email' => $mail,
		'password' => $pass,
		'check' => $pass,
		'keywords' => '',
		'aliases' => '',
		'group' => '',
		'private' => 'on',
		'subscribe' => 'off',
		'www' => '',
		'confirmed' => ' зарегистрировать &gt;&gt; '
	);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);	
	$html = curl_exec($ch); //1
	curl_close ($ch);
}
?>