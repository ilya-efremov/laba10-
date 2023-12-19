<html>
<head>
<title>lab</title>
<meta charset="utf-8">
</head>
<body>
<form method="POST" action="">
<input name="Name" type="text" placeholder="Логин">
<input name="text" type="password" placeholder="Пароль">
<input type="submit" value="Добавить">
</form><?php
$connect = mysqli_connect("localhost","root","root","reg");
if (isset($_POST["Name"])) {
$sql = mysqli_query($connect, "INSERT INTO `prod` (`Name`, `Text`) VALUES ('{$_POST['Name']}', '{$_POST['text']}')");
if ($sql) {
echo '<p>Данные успешно добавлены в таблицу.</p>';
} else {
echo '<p>Произошла ошибка: ' . mysqli_error($connect) . '</p>';
}
}
?>
</form>
</body>
</html>