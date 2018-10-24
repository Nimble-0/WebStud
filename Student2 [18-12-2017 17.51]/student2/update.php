<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link rel="stylesheet" type="text/css" href="style.css">
<title>Редактирование</title>
</head>

<body>
<?php
require 'connect2.php';
$id=$_REQUEST['id'];
$name=trim($_REQUEST['name']);
$group_id=trim($_POST['group_id']);


$update_sql = "UPDATE `students` SET name='$name', group_id='$group_id' WHERE id='$id'";
if ($name != null){
	mysql_query($update_sql) or die (mysql_error());
echo '<p>Запись успешно обновлена!</p>';
}
else
	echo "<p>Поле 'Студент' осталось пустым</p>";
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