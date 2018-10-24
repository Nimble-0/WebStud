<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link rel="stylesheet" href="style2.css"  type="text/css">
<title>Добавление данных</title>
<center><h2>Добавление данных</h2></center>
</head>

<body>
<form action='add_mark_form.php' method='post' name='forma'>
<fieldset>

<input type='hidden' name='id'><br/>
<label for='student_id'>Cтудент:</label><br/>

	<select name="student_id">
<?
require "connect2.php";
$res = mysql_query('select `id`, `name` from `students`');
while($row = mysql_fetch_assoc($res)){
    ?>
    <option value="<?=$row['id']?>"><?=$row['id'],". ",$row['name']?></option>
    <?
}
?>
</select><br/>

<label for='subject_id'>Предмет:</label><br/>
	<select name="subject_id">
<?
$res = mysql_query('select `id`, `name` from `subjects`');
while($row = mysql_fetch_assoc($res)){
    ?>
    <option value="<?=$row['id']?>"><?=$row['id'],". ",$row['name']?></option>
    <?
}
?>
</select><br/>
<label for='mark'>Оценка:</label><br/>
<input type='int' name='mark' size='10'><br/>

<label for='date'>Дата:</label><br/>
<input type='date' name='date' value="<?=date('Y-m-d');?>" size='20'><br/>

</fieldset>
<br/>
<fieldset>
<input id='submit' type='submit' value='Добавить в базу'><br/>
</fieldset>
</form>
</body>
<div id="footer">
	  <a href="students.php">Вернуться к таблице</a></br>
	  <a href="main.php">На главную</a>
</div>
<div id="footerR">
 <a href="students_list.php">Список студентов</a>
</div>
</html>