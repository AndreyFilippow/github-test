<?
include_once('../connect.php');
$id=$_GET['id'];

mysqli_query($connection,"DELETE FROM articles WHERE id='$id'");
mysqli_close($connection);

header('Location: admin.php');

;
?>