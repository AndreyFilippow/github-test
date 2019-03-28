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
	
<?
	require('../connect.php');

	$id=$_GET['id'];
	

$result=mysqli_query($connection,"SELECT name,text,date FROM articles WHERE id='$id'");

$row= mysqli_fetch_assoc($result);

if(isset($_POST['save']))
{
$name= $_POST['name'];
$text= $_POST['text'];

mysqli_query($connection,"UPDATE articles SET name='$name', text='$text' WHERE id='$id'");
mysqli_close($connection);

}

?>     
	<div class="news">

			<form method="post" action="edit-articles.php?id=<?echo $id;?>">
				<p>Редактирование статьи</p>
				Название статьи<br>
				<input type="text" name="name" value="<?echo $row['name'];?>"><br>
				Текст статьи<br>
				<textarea cols="40" rows="10" name="text"><?echo $row['text'];?></textarea><br>
				<input type="submit" name="save" value="Сохранить">
				
			</form>

		</div>

	</div>	
	
</body>
</html>