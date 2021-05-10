<?
$db = new mysqli("localhost",'library','solomin2005','library');
if ($db->connect_errno !== 0){
	die('Ошибка подключения к базе данных');
} else {
	$db->set_charset('utf8');
}
?>