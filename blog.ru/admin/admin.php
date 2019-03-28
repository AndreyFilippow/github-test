
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
					<li><a href="../index.php">Регистрация</a></li>
				</ul>
		</div>
		</div>
		 
<div><a href="adding-articles.php">Добавление статьи</a></div><br>
 <? include_once('../connect.php');  
	$result=mysqli_query($connection,'SELECT id,name,text,date FROM articles');
	 mysqli_close($connection);

			while ($row=mysqli_fetch_assoc($result)):?> 
		
			<div class="block">
				<div class="name"><?echo $row['name']?></div>
				<div class="text"><?echo $row['text']?>
				</div>
				<div class="date"><?echo $row['date']?></div>
				<div class="href"><a href="#">Подробнее</a></div>
				<div><a href="edit-articles.php?id=<?echo $row['id']?>">Редактировать статью</a></div>
				<div><a href="delete-articles.php?id=<? echo $row['id']?>">Удалить статью</a></div>

			</div>
<?
endwhile;
?>	

</body>
</html>