<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>MakeMeElvis.com</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<h2>MakeMeElvis.com</h2>


	<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];

	$name =$_POST['firstname'] . ' ' .  $_POST['lastname'];

	$dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
		or die('Ошибка соеднинения с MySQL-сервером');
	echo '<pre>';
	var_dump($dbc);
	echo '</pre>';
	echo '<hr>' . '<br>';		

	
	$query = "INSERT INTO email_list (first_name, last_name, email) VALUES ('$firstname', '$lastname', '$email')";
	echo '<pre>';
	var_dump($query);
	echo '</pre>';
	echo '<hr>' . '<br>';
	$result = mysqli_query($dbc, $query) or die ('Ошибка при выполнении запроса к базе данных.');
	mysqli_close($dbc);



	echo "Дорогой {$name}" . '<br>';
	echo 'Спасибо за заполнение формы. <br />';
	echo 'Вы были добавлены в спам-рассылку';

	echo '<br>';
	phpinfo(32);

	?>
</body>	
</html>