<?php
require 'database.php';
$id = htmlspecialchars(addslashes($_GET['id']));
echo $id;
$result = mysqli_query($db,"SELECT * FROM users"); 
$result_arr = mysqli_fetch_assoc($result);

$name = htmlspecialchars(addslashes($_POST['name']));
$sur = htmlspecialchars(addslashes($_POST['sur']));
$bir = htmlspecialchars(addslashes($_POST['bir']));
$tel = htmlspecialchars(addslashes($_POST['tel']));
$email = htmlspecialchars(addslashes($_POST['email']));
$pass = htmlspecialchars(addslashes($_POST['pass']));

mysqli_query($db,"UPDATE users SET name = '$name' WHERE id = '$id'");
mysqli_query($db,"UPDATE users SET surname = '$sur' WHERE id = '$id'");
mysqli_query($db,"UPDATE users SET birth = '$bir' WHERE id = '$id'");
mysqli_query($db,"UPDATE users SET phone = '$tel' WHERE id = '$id'");
mysqli_query($db,"UPDATE users SET `e-mail` = '$email' WHERE id = '$id'");
mysqli_query($db,"UPDATE users SET password = '$pass' WHERE id = '$id'");

?>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Задание 1</title>
	</head>

	<body>
		<h2>Изменение данных</h2>
		<form action = '' method = 'post'>
			<p>Имя: <input value = "<?= $result_arr['name']?>" type='text' name='name' placeholder = 'Имя'></p>
			<p>Фамилия: <input value = '<?=$result_arr['surname']?>' type='text' name='sur' placeholder = 'Фамилия'></p>
			<p>Дата рождения: <input value = '<?=$result_arr['birth']?>' type='date' name='bir' placeholder = 'Дата рождения'></p>
			<p>Телефон: <input value = '<?=$result_arr['phone']?>' type='text' name='tel' placeholder = 'Телефон'></p>
			<p>Почта: <input value = '<?=$result_arr['e-mail']?>' type='email' name='email' placeholder = 'Почта'></p>
			<p>Пароль: <input value = '<?=$result_arr['password']?>' type='password' name='pass' placeholder = 'Пароль'></p>
			<p><input type='submit' value='Загрузить'></p>
		</form>
	</body>
</html>