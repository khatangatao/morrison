<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Удаление письма из рассылки</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<h2>Удаление письма из рассылки</h2>

	<!-- создаем форму для выбора записей на удаление -->
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

		<?php
		ini_set('display_errors',1);
		error_reporting(E_ALL);

		//соединяемся с базой
		$dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
			or die('Ошибка соеднинения с MySQL-сервером');

		//проверяем, был ли вызван скрипт по нажатию кнопки submit
		if (isset($_POST['submit'])) {
			foreach ($_POST['todelete'] as $delete_id) {
				$query = "DELETE FROM email_list WHERE id = $delete_id";
				mysqli_query($dbc, $query) or die('Ошибка соеднинения с базой данных');
			}
			echo 'Покупатель (ли) удален(ы) . <br />';
		}

		//Ввод записей покупателей вместе с кнопками с независимой фиксацией
		//для отметки удаляемых покупателей
		$query = "SELECT * FROM email_list";
		$result = mysqli_query($dbc, $query);
		while ($row = mysqli_fetch_array($result)) {
			echo '<input type="checkbox" value="' . $row['id'] . '" name="todelete[]" />';
			echo $row['first_name'];
			echo ' ' . $row['last_name'];
			echo ' ' . $row['email'];
			echo '<br />';
		}

		mysqli_close($dbc);



	// $email = $_POST['email'];

	// $dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
	// 	or die('Ошибка соеднинения с MySQL-сервером');

	// $query = "DELETE FROM email_list WHERE email = '$email'";

	// $result = mysqli_query($dbc, $query) or die ('Ошибка при выполнении запроса к базе данных.');

	// mysqli_close($dbc);
	// echo 'Клиент удален: ' . $email . '<br>';
	// echo '<br>';

		?>
		<input type="submit" name="submit" value="Удалить" />
	</form>
	<?php phpinfo(32); ?>
</body>	
</html>