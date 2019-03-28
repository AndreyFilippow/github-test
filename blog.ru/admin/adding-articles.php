<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Админ Панель</title>
	<link rel="stylesheet" type="text/css" href="../css/style-blog.css">
</head>
<body>
	<div class="main">
	
		<div class="top-menu">
			<div class="logo">Ад<span>м</span>ин Па<span>н</span>ель </div>
			<div class="menu">
				<ul>
					<li><a href="../blog.php">Главная</a></li>
					<li><a href="#">Статьи</a></li>
					<li><a href="../logout.php">Выход</a></li>
					<li><a href="admin.php">Админ панель</a></li>
				</ul>
		</div>
		</div>
		<div class="news">

			<form method="post" >
				<p>Добавление статьи</p>
				Название статьи<br>
				<input type="text" name="name"><br>
				Текст статьи<br>
				<textarea cols="40" rows="10" name="text"></textarea><br>
				<input type="hidden" name="date" value="<?echo date('Y-m-d')?>">
				<input type="submit" name="but" value="добавить">
				
			</form>

		</div>

	</div>	
<?
	require('../connect.php');	
if(isset($_POST["text"])){
$name= $_POST['name'];
$text= $_POST['text'];
$date= $_POST['date'];


$query="INSERT INTO articles(name, text, date) VALUES('$name','$text','$date')";
		$result=mysqli_query($connection,$query) or die(mysqli_error($connection));
		
echo 'Новость успешно добавлена';

}

?>     
	
</body>
</html>