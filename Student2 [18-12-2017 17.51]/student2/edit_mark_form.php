<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link rel="stylesheet" href="style.css" />
<title>Редактирование</title>
</head>
<body>
<?php 
require 'connect2.php';
$mark_id = trim($_REQUEST['id']);
$student_id=trim($_POST['student_id']);
$subject_id=trim($_POST['subject_id']);
$mark=trim($_REQUEST['mark']);
$date=trim($_REQUEST['date']);

$insert_sql = "UPDATE `marks` SET mark='$mark', date='$date', stud_id='$student_id', sub_id='$subject_id' WHERE id='$mark_id' ";

if ($mark != null){
	mysql_query($insert_sql) or die (mysql_error());
echo '<p>Запись успешно обновлена!</p>';
}
else
	echo "<p>Одно из полей осталось незаполненым</p>";



?>
<div id="footer">
	  <a href="students.php">Вернуться к таблице</a></br>
	  <a href="main.php">На главную</a>
</div>
<div id="footerR">
 <a href="students_list.php">Список студентов</a>
</div>
</body>
</html>