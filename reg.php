<html>
<head>
<title>lab</title>
</head>
<body>
<form method="POST" action="">
<input name="Name" type="text" placeholder="Логин">
<input name="text" type="password" placeholder="Пароль">
<input name="texttwo" type="password" placeholder="Повтор пароля">
<input name="textwo" type="text" placeholder="E-mail">
<input name="texthee" type="text" placeholder="Имя">
<input type="submit" value="Регистрация">
<input type="submit" value="Авторизация" name="push">
</form><?php
$connect = mysqli_connect("localhost","root","root","reg");
if (isset($_POST["Name"])) {

if (isset($_POST["push"])){
echo '<script>window.location.href = "autoris.php";</script>';
exit();
}

$login = $_POST['Name'];
$password = $_POST['text'];
$passwordtwo = $_POST['texttwo'];
$email = $_POST['textwo'];
$name = $_POST['texthee'];

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$check = mysqli_query($connect, "SELECT * FROM `prod` WHERE login = '$login'");
$result = mysqli_fetch_assoc($check);
if ($result){
echo 'Логин занят!';
die();
}

if($password != $passwordtwo || strlen($password) < 8 || preg_match('/[0-9A-Z!@#$_&\-]/', $password)== false){
echo 'Состоящий заглавные буквы, цифры и специальные символы не подходят к паролю';
die();
}

$sql = mysqli_query($connect, "INSERT INTO `prod` (`login`, `password`, `e-mail`, `name`) VALUES ('$login', '$passwordHash', '$email', '$name')");
if ($sql) {
echo '<p>Данные успешно добавлены в таблицу.</p>';
} else {
echo '<p>Произошла ошибка: ' . mysqli_error($connect) . '</p>';
}
}
?>
</body>
</html>