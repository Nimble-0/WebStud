
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link rel="stylesheet" type="text/css" href="style.css">
<title>Удаление</title>
</head>

<body>
<?php
require 'connect2.php';
$id = $_REQUEST['id'];
$delete_sql = "DELETE FROM `students` WHERE id=$id";
mysql_query($delete_sql) or 
die("<p>При удалении произошла ошибка</p>". mysql_error());
echo "<p>Запись была успешно удалена!</p>";
?>

<div id="footer">
	  <a href="students_list.php">Вернуться к списку</a></br>
	  <a href="main.php">На главную</a>
</div>
<div id="footerR">
 <a href="students.php">Таблица оценок</a>
</div>
</body>
</html>