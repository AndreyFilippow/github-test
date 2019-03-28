<?session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Блог</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>

	<div class="conteiner">
		<form action="" class="form-signin" method="POST">
			<h2>Вход на сайт</h2>
			<input type="text" name="username" class="form-control" placeholder="Логин" required>
			<input type="password" name="password" class="form-control" placeholder="Пароль" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Вход</button>	
			<a href="index.php"class="btn btn-lg btn-primary btn-block">Регистрация</a>	

		</form>
	</div>
<?php

	require('connect.php');	

	$salt = 'salt5678901234567890123456789012';

if(isset($_POST['username']) and isset($_POST['password'])){
		$username=$_POST['username'];

		$options['salt'] = $salt;
		$hash=password_hash($_POST['password'], PASSWORD_BCRYPT,$options);
		$password=$hash;
		
		

		$query="SELECT*FROM users WHERE username='$username' and password='$password'";
		$result=mysqli_query($connection,$query) or die(mysqli_error($connection));
		$count=mysqli_num_rows($result);
		if($count==1){
			$_SESSION['username']=$username;
		
		}
}



if(isset($_SESSION['username'])){
	$username=$_SESSION['username'];?>
	<span class='out'><?$out="Привет".' '.$username." "."Вы вошли на сайт".' '."<a href='blog.php' clas='btn btn-lg btn-primary btn-block'>Переход на Блог</a>".' '.'или'.' '."<a href='logout.php' clas='btn btn-lg btn-primary btn-block'>Выход с аккаунта</a>";?></span>
	<?echo $out;
}  


?>		
</body>
</html>