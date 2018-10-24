<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Untitled Document</title>
</head>
<body>
<?php 
require 'connect2.php';
$student_id=trim($_POST['student_id']);
$subject_id=trim($_POST['subject_id']);
$mark=trim($_REQUEST['mark']);
$date=trim($_REQUEST['date']);

$update_sql = "UPDATE `marks` (`stud_id`, `sub_id`, `mark`, `date`) VALUES('$student_id', '$subject_id', '$mark', '$date');";

if ($mark != null){
	mysql_query($update_sql) or die (mysql_error());
	echo "<p>Новая оценка добавлена в базу!</p>";
}
else
	echo "<p>Одно из полей осталось незаполненым</p>";


?>
<p><a href="edit_mark.php">Назад</a></p>
<p><a href="students.php">Вернуться к таблице</a></p>
<p><a href="main.php">На главную</a></p>
</body>
</html>