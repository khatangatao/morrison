<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Отправка массового СПАМА</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<h2>Отправка массового СПАМА</h2>
	<img src="blankface.jpg" width="161" height="350" alt="" style="float:right" />
  	<img name="elvislogo" src="elvislogo.gif" width="229" height="32" border="0" alt="Make Me Elvis" />


	<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);



	if (isset($_POST['submit'])) {
		$from = 'khatan@mail.ru';
		$subject = $_POST['subject'];
		$text = $_POST['elvismail'];
		$output_form = false;

		if (!empty($subject) && !empty($text)) {
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
	    	 	$output_form = true;
	    	 	echo 'Введите тему письма' . '<br>';
	    	 } elseif (empty($text)) {
	    	 	$output_form = true;
	    	 	echo 'Введите текст письма' . '<br>';
	    	 }


	    	// echo 'Введите недостающие данные';
		}
	} else {
	    $output_form = true;
	}



	if ($output_form) {
	?>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>"> <!-- подставляем суперглобальную переменную $_SERVER["PHP_SELF"] в качестве ссылки сценария на самого себя -->
		    <label for="subject">Subject of email:</label><br />
		    <input id="subject" name="subject" type="text" size="30" /><br />
		    <label for="elvismail">Body of email:</label><br />
		    <textarea id="elvismail" name="elvismail" rows="8" cols="40"></textarea><br />
		    <input type="submit" name="submit" value="Submit" />
  		</form>

	<?php
	}
	phpinfo(32);
	?>
</body>	
</html>