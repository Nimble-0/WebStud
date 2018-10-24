<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link rel="stylesheet" href="style.css" />
<title>Добавление</title>
</head>
<body>
<?php 
require 'connect2.php';
$student_id=trim($_POST['student_id']);
$subject_id=trim($_POST['subject_id']);
$mark=trim($_REQUEST['mark']);
$date=trim($_REQUEST['date']);

$insert_sql = "INSERT INTO `marks` (`stud_id`, `sub_id`, `mark`, `date`) VALUES('$student_id', '$subject_id', '$mark', '$date');";

if ($mark != null and $date != null and $student_id != null and $subject_id != null){
	mysql_query($insert_sql) or die (mysql_error());
	echo "<p>Новая оценка добавлена в базу!</p>";
}
else
	echo "<p>Одно из полей осталось незаполненым</p>";


?>
<div id="footer">
<table width="100%" cellspacing="0" cellpadding="4">
<tr> 
     
      <a href="add_mark.php">Назад</a></br>
	  <a href="students.php">Вернуться к таблице</a></br>
	  <a href="main.php">На главную</a>
    </tr>
 </table>


</div>
<div id="footerR">
 <a href="students_list.php">Список студентов</a>
</div>
</body>
</html>