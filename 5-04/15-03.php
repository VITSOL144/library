<?php
$name = htmlspecialchars(addslashes($_POST['name']));
$sur = htmlspecialchars(addslashes($_POST['sur']));
$bir = htmlspecialchars(addslashes($_POST['bir']));
$tel = htmlspecialchars(addslashes($_POST['tel']));
$email = htmlspecialchars(addslashes($_POST['email']));
$pass = htmlspecialchars(addslashes($_POST['pass']));

$pass = md5(md5($pass));

require 'database.php';
$query = "INSERT INTO `users` (`name`,`surname`,`birth`,`phone`,`e-mail`,`password`) VALUES ('$name','$sur','$bir','$tel','$email','$pass')";

mysqli_query($db,$query);

$result = mysqli_query($db,"SELECT * FROM users"); 
echo '<table>
		<tr>
			<td>id</td>
			<td>Имя</td>
			<td>Фамилия</td>
			<td>Дата рождения</td>
			<td>Телефон</td>
			<td>Почта</td>
			<td>Пароль</td>
			<td>Действие 1</td>
			<td>Действие 2</td>
		</tr>';
for ($i = 0; $i<mysqli_num_rows($result); $i++){
	$result_arr = mysqli_fetch_assoc($result);
	echo '<tr>';
	echo '<td>'.$result_arr['id'].'</td>
		<td>'.$result_arr['name'].'</td>
		<td>'.$result_arr['surname'].'</td>
		<td>'.$result_arr['birth'].'</td>
		<td>'.$result_arr['phone'].'</td>
		<td>'.$result_arr['e-mail'].'</td>
		<td>'.$result_arr['password'].'</td>
		<td><a href="users.php?id='.$result_arr['id'].'">Редактировать аккаунт</a></td>
		<td><a href="del.php?id='.$result_arr['id'].'">Удалить аккаунт</a></td>';
	echo '</tr>';
}
echo '</table>';

mysqli_query($db,"UPDATE users SET name = 'Дмитрий' WHERE name = 'Михаил'");


?>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Задание 1</title>
		<style>
		td{
			border:1px solid black;
			border-collapse:collapse;
			padding:0 15px;
		}
		table{
			border:1px solid black;
			border-collapse:collapse;
		}
		</style>
	</head>

	<body>
		<h2>Регистрация в библиотеку</h2>
		<form action = '' method = 'post'>
			<p>Имя: <input type='text' name='name' placeholder = 'Имя'></p>
			<p>Фамилия: <input type='text' name='sur' placeholder = 'Фамилия'></p>
			<p>Дата рождения: <input type='date' name='bir' placeholder = 'Дата рождения'></p>
			<p>Телефон: <input type='text' name='tel' placeholder = 'Телефон'></p>
			<p>Почта: <input type='email' name='email' placeholder = 'Почта'></p>
			<p>Пароль: <input type='password' name='pass' placeholder = 'Пароль'></p>
			<p><input type='submit' value='Загрузить'></p>
		</form>
	</body>
</html>