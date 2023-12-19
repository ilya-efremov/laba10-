<html>
<title>лаба10</title>
<body>
	<form method="POST" id="form">
		<input type="text" name="login" placeholder="Логин">
		<input type="password" name="onepassword" placeholder="Новый пароль">
		<input type="password" name="twopassword" placeholder="Повтор пароля">
		<input type="submit" name="restpass" value="Сбросить пароль">
		<input type="submit" name="perechod" value="Форма входа">
	</form>
<?php
	require 'reg.php';
	
	if (isset($_POST['perechod'])){
		header('location:autoris.php');
		exit();
	}
	
	if (isset($_POST['restpass'])){
		$login = $_POST['login'];
		$twopassword = $_POST['twopassword'];
		$onepassword = $_POST['onepassword'];
		$query = mysqli_query($connect, "SELECT * FROM `prod` WHERE login = '$login'");
		$result = mysqli_fetch_assoc($query);
		if ($result == true && $twopassword == $onepassword && strlen($twopassword) > 8 && preg_match('/[A-Z0-9~`!@#$%\^&*()_\-+={|:;<,>.?\/]/', $twopassword)){
			$hashpass = md5($twopassword);
			$secondquery = mysqli_query($connect, "UPDATE `prod` SET `password` = '$password'");
			if ($secondquery == true)
			echo 'Успешно!';
		}
		else {
			echo 'Ошибка!';
		}
	}
?>
</body>
</html>