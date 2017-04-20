<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Отправка массового СПАМА</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<h2>Отправка массового СПАМА</h2>


	<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);


	$from = 'khatan@mail.ru';
	$subject = $_POST['subject'];
	$text = $_POST['elvismail'];

	if (!empty($subject) && !empty($text)) {
		// $from = 'khatan@mail.ru';
		// $subject = $_POST['subject'];
		// $text = $_POST['elvismail'];	

		$dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
			or die('Ошибка соеднинения с MySQL-сервером');
		
		$query = "SELECT * FROM email_list";

		$result = mysqli_query($dbc, $query) or die ('Ошибка при выполнении запроса к базе данных.');
		
		while ($row = mysqli_fetch_array($result)) {
			echo '<pre>';
			//var_dump($row);
			print_r($row);
			echo '</pre>';
			
			foreach ($row as $key => $value) {
				echo 'ключ' . ' \'' . $key . '\' ' . 'значение ключа' . '\' ' . $value . '\'' . '<br>';
			}

			$first_name = $row['first_name'];
			$last_name = $row['last_name'];

			$msg = "Уважаемый $first_name $last_name, \n $text";
			$to = $row['email'];
			mail($to, $subject, $msg, 'From: ' . $from);
			echo 'Электронное письмо отправлено:' . $to . '<br>';
			echo '<hr>';
		}

		mysqli_close($dbc);

		echo '<br>';
		//phpinfo(32);
	} else {
    	 if (empty($subject)) {
    	 	echo 'Введите тему письма' . '<br>';
    	 } elseif (empty($text)) {
    	 	echo 'Введите текст письма' . '<br>';
    	 }


    	echo 'Введите недостающие данные';
	}

	?>
</body>	
</html>