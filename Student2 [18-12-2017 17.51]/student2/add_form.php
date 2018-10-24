<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link rel="stylesheet" type="text/css" href="style.css">
<title>Добавление данных</title>
</head>
<body>
<?php 
require 'connect2.php';
$student_name=trim($_REQUEST['student_name']);
$student_group=trim($_POST['group']);

$group_name=trim($_REQUEST['group_name']);
$subject_name=trim($_REQUEST['subject_name']);

$insert_sql1 = "INSERT INTO `students` (`name`, `group_id`) VALUES('$student_name', '$student_group');";
$insert_sql2 = "INSERT INTO `groups` (`name`) VALUES('$group_name');";
$insert_sql3 = "INSERT INTO `subjects` (`name`) VALUES('$subject_name');";


if ($student_name != null){
	mysql_query($insert_sql1) or die (mysql_error());
	echo "<p>Новый студент добавлен в базу!</p>";
}
else
	echo "<p>Поле студента осталось пустым</p>";

if ($group_name != null){
	mysql_query($insert_sql2) or die (mysql_error());
	echo "<p>Новая группа добавлена в базу!</p>";
}
else
	echo "<p>Поле группы осталось пустым</p>";

if ($subject_name != null){
	mysql_query($insert_sql3) or die (mysql_error());
	echo "<p>Новый предмет добавлен в базу!</p>";
}
else
	echo "<p>Поле предмета осталось пустым</p>";

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