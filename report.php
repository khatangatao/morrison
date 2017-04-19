<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Космические пришельцы похищали меня - сообщение о похищении</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<h2>Космические пришельцы похищали меня - сообщение о похищении</h2>


	<?php
	$when_it_happened = $_POST['whenithappened'];
	$how_long = $_POST['howlong'];
	$alien_description = $_POST['aliendescription'];
	$fang_spotted = $_POST['fangspotted'];
	$email = $_POST['email'];

	echo 'Спасибо за заполнение формы. <br />';
	echo 'Вы были похищены ' . $when_it_happened;
	echo ' и отсутствовали в течение ' . $how_long . '<br />';
	echo 'Опишите их: ' . $alien_description . '<br />';
	echo 'Видели ли вы мою собаку Фэнга?' . $fang_spotted . '<br />';
	echo 'Ваш адрес электронной почты:' . $email;

	echo '<br>';
	phpinfo();

	?>
</body>	
</html>