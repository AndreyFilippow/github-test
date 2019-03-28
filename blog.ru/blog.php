<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Блог</title>
	<link rel="stylesheet" type="text/css" href="css/style-blog.css">
</head>
<body>
	<div class="main">
	
		<div class="top-menu">
			<div class="logo">Фили<span>п</span>пов</div>
			<div class="menu">
				<ul>
					<li><a href="#">Главная</a></li>
					<li><a href="#">Статьи</a></li>
					<li><a href="logout.php">Выход</a></li>
					<li><a href="admin/admin-log.php">Админ панель </a></li>
				</ul>
			</div>
		</div>
		<!-- <div class="news"> -->
			<? include_once('connect-blog.php'); ?> 
			<? $sql=$db->query('SELECT * FROM `articles`' ); 
			$db->close;
			while ($result=$sql->fetch_assoc()):?> 
		
			<div class="block">
				<div class="name"><?=$result['name']?></div>
				<div class="text"><?=$result['text']?>
				</div>
				<div class="date"><?=$result['date']?></div>
				<div class="href"><a href="#">Подробнее</a></div>

		</div>

	<!-- </div>	 -->

<?
endwhile;
?>

</body>
</html>