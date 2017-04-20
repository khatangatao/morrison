<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Удаление письма из рассылки</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<h2>Удаление письма из рассылки</h2>


	<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);


	$email = $_POST['email'];

	$dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
		or die('Ошибка соеднинения с MySQL-сервером');
	// echo 'подключение к БД прошло' . '<br>';

	$query = "DELETE FROM email_list WHERE email = '$email'";

	$result = mysqli_query($dbc, $query) or die ('Ошибка при выполнении запроса к базе данных.');

	mysqli_close($dbc);
	echo 'Клиент удален: ' . $email . '<br>';
	echo '<br>';
	//phpinfo(32);

	?>
</body>	
</html>