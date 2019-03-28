
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Админ панель</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/style1.css">
</head>
<body>

<?php

	require('../connect.php');	

	$salt = 'salt5678901234567890123456789012';

if(isset($_POST['username']) and isset($_POST['password'])){
		$username=$_POST['username'];

		$options['salt'] = $salt;
		$hash=password_hash($_POST['password'], PASSWORD_BCRYPT,$options);
		$password=$hash;
		
		

		$query="SELECT*FROM users WHERE username='admin' and password='$password'";
		$result=mysqli_query($connection,$query) or die(mysqli_error($connection));
		$count=mysqli_num_rows($result);
		if($count==1){
			$_SESSION['username']=$username;
		
		}else{
				$fsms="Пошел вон ты не ADMIN";
		}
		
}

?>		
<div class="conteiner">
		<form action="" class="form-signin" method="POST">
			<h2>Вход в Админ панель</h2>
			<? if(isset($fsms)){ ?><div class="alert alert-danger"role="alert"><? echo $fsms; ?> </div><?}?>
			<input type="text" name="username" class="form-control" placeholder="Логин" required>
			<input type="password" name="password" class="form-control" placeholder="Пароль" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Вход</button>	
		

		</form>
	</div>

<?
if(isset($_SESSION['username'])){
	$username=$_SESSION['username'];?>
	<span class='out'><?$out="О ВЕЛИКИЙ	".' '.$username." "."Не хотите ли вы".' '."<a href='admin.php' clas='btn btn-lg btn-primary btn-block'>Перейти к Админ панели</a>".' '.'или'.' '."<a href='../logout.php' clas='btn btn-lg btn-primary btn-block'>Вернуться к смертным?</a>";?></span>
	<?echo $out;
}  

?>	
</body>
</html>