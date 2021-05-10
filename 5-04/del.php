<?php
require 'database.php';
$id = htmlspecialchars(addslashes($_GET['id']));
echo $id;

mysqli_query($db,"DELETE FROM users WHERE id = $id");

?>