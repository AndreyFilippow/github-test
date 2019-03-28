<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Блог</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
<?
	require('connect.php');
	
$salt = 'salt5678901234567890123456789012';

	if(isset($_POST['username']) && isset($_POST['password'])){
		$username=$_POST['username'];
		$email=$_POST['email'];

		$options['salt'] = $salt;
		$hash=password_hash($_POST['password'], PASSWORD_BCRYPT,$options);
		$password=$hash;
		

		$query="INSERT INTO users(username,password,email) VALUES('$username','$password','$email')";
		$result=mysqli_query($connection,$query);

		if($result){
			$ssms="Регистрация прошла успешно";
		}else{
			$fsms="Ошибка";
		}

	}
		
?>




	<div class="conteiner">
		<form action="" class="form-signin" method="POST">
			<h2>Регистрация пользователя на Блог Филиппов.ru</h2>
			<? if(isset($ssms)){ ?><div class="alert alert-success"role="alert"><? echo $ssms; ?> </div><?}?>
			<? if(isset($fsms)){ ?><div class="alert alert-danger"role="alert"><? echo $fsms;?> </div><?}?>

			
			<input type="text" name="username" class="form-control" placeholder="Логин" required>
			<input type="email" name="email" class="form-control" placeholder="Email" required>
			<input type="password" name="password" class="form-control" placeholder="Пароль" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Регистрация</button>	
			<a href="login.php"class="btn btn-lg btn-primary btn-block">Если вы зарегестрированы</a>	

		</form>
	</div>
</body>
</html>