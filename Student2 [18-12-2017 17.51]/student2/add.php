<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link rel="stylesheet" href="style2.css"  type="text/css">
<title>Добавление данных</title>
<center><h2>Добавление данных</h2></center>
</head>

<body>
<form action='add_form.php' method='post' name='forma'>
<fieldset>

<input type='hidden' name='id'><br/>
<label for='student_name'>Добавить студента:</label><br/>
<input type='text' name='student_name' size='20'><br/>

<label for='student_group'>Группа:</label><br/>
	<select name="group">
<?
require "connect2.php";
$res = mysql_query('select `id`, `name` from `groups`');
while($row = mysql_fetch_assoc($res)){
    ?>
    <option value="<?=$row['id']?>"><?=$row['name']?></option>
    <?
}
?>
</select>
</fieldset>
<fieldset>
<label for='group_name'>Добавить группу:</label><br/>
<input type='text' name='group_name' size='20'><br/>
<label for='subject_name'>Добавить предмет:</label><br/>
<input type='text' name='subject_name' size='20'><br/>


</fieldset>
<br/>
<fieldset>
<input id='submit' type='submit' value='Добавить в базу'><br/>
</fieldset>
</form>
</body>
<div id="footer">
	  <a href="students_list.php">Вернуться к списку</a></br>
	  <a href="main.php">На главную</a>
</div>
<div id="footerR">
 <a href="students.php">Таблица оценок</a>
</div>
</html>