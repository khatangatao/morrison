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
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$name =$_POST['firstname'] . ' ' .  $_POST['lastname'];

	$when_it_happened = $_POST['whenithappened'];
	$how_long = $_POST['howlong'];
	$howmany = $_POST['howmany'];
	
	$alien_description = $_POST['aliendescription'];
	$whattheydid = $_POST['whattheydid'];


	$fang_spotted = $_POST['fangspotted'];
	$email = $_POST['email'];
	$other = $_POST['other'];

	$to = 'khatan@mail.ru';
	$subject = 'Космические пришельцы похищали меня - сообщение о похищении';

	$msg = 
		"$name был похищен $when_it_happened и отсутствовал в течение $how_long. \n" . 
		"Количество космических пришельцев: $howmany\n" . 
		"Описание космических пришельцев: $alien_description\n" . 
		"Что они делали: $whattheydid\n" . 
		"Фенг замечен? $fang_spotted\n" . 
		"Дополнительная информация: $other"; 

	//mail($to, $subject, $msg, 'From: ' . $email);

	$dbc = mysqli_connect('localhost', 'root', '', 'aliendatabase')
		or die('Ошибка соеднинения с MySQL-сервером');
	echo '<pre>';
	var_dump($dbc);
	echo '</pre>';
	echo '<hr>' . '<br>';		

	
	$query = "INSERT INTO aliens_abduction (first_name, last_name, when_it_happened, how_long, how_many, alien_description, what_they_did, fang_spotted, other, email) VALUES ('$firstname', '$lastname', '$when_it_happened', '$how_long', '$howmany', '$alien_description', '$whattheydid', '$fang_spotted', '$other', '$email')";
	echo '<pre>';
	var_dump($query);
	echo '</pre>';
	echo '<hr>' . '<br>';
	$result = mysqli_query($dbc, $query) or die ('Ошибка при выполнении запроса к базе данных.');
	mysqli_close($dbc);



	echo "Дорогой {$name}" . '<br>';
	echo 'Спасибо за заполнение формы. <br />';
	echo 'Вы были похищены ' . $when_it_happened;
	echo ' и отсутствовали в течение ' . $how_long . '<br />';
	echo "Сколько их было: {$howmany}" . '<br>';
	echo 'Опишите их: ' . $alien_description . '<br />';
	echo "Что они с вами сделали: {$whattheydid}" . '<br />';
	echo 'Видели ли вы мою собаку Фэнга?' . $fang_spotted . '<br />';
	echo 'Ваш адрес электронной почты:' . $email . '<br />';

	echo "Скажите что-нибудь умное: {$other}" . '<br />';

	echo '<br>';
	phpinfo(32);

	?>
</body>	
</html>