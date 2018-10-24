<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link rel="stylesheet" href="style2.css"  type="text/css">
<title>Средняя оценка</title>
<center><h2>Средняя оценка</h2></center>
</head>

<body>
<?php
require "connect2.php";
$cur_id = $_GET['id'];
if(!empty($cur_id)){
	require "connect2.php";
	$result = mysql_query("
	SELECT students.id, students.name, students.group_id 
	FROM `students`
	WHERE students.id= $cur_id ");
	$row = mysql_fetch_array($result);
	$name = $row['name'];
$group_id = $row['group_id'];}

//-------------------------------------------------------------------------
$sub_id=trim($_POST['subject_id']);
if(!empty($sub_id)){
$resultX = mysql_query(" 
SELECT marks.id, marks.mark, marks.date, stud_id, sub_id
FROM `marks` 
WHERE stud_id = $cur_id AND sub_id = $sub_id ") or die (mysql_error());
/*
echo $cur_id;
echo $sub_id;
echo $name;

$rowsX = mysql_num_rows($resultX);
for($i=0;$i<$rowsX;$i++){
	$mark_id = mysql_result($resultX,$i,'marks.id'); 	
	$mark = mysql_result($resultX,$i,'marks.mark') ;
	echo mysql_result($resultX,$i,'marks.mark'), ' '; 
	}
*/
$resultA = mysql_query(" 
SELECT AVG(mark) AS mark
FROM `marks` 
WHERE stud_id = $cur_id AND sub_id = $sub_id ") or die (mysql_error());
$rowA = mysql_fetch_array($resultA); 

$resultB = mysql_query(" 
SELECT AVG(mark) AS mark
FROM `marks` 
WHERE stud_id = $cur_id ") or die (mysql_error());
$rowB = mysql_fetch_array($resultB); 
}

//-------------------------------------------------------------------------
?>

</select>

<form method='post' name='forma'>
<fieldset>

<input type='hidden' name='id'><br/>
<label for='student_name'>Студент:</label></br>
<input readonly type='int' name='student' size='10' value='<?php echo $name?>'>
<?
$res = mysql_query('select `id`, `name` from `groups`');
while($row = mysql_fetch_assoc($res)){
	if($row['id'] == $group_id){
    ?>
<p><label for='student_name'>Группа: </label></br>
<input readonly type='int' name='group' size='10' value='<?php echo $row['name']?>'>
<?
}}
?>
<p><label for='subject_id'>Предмет:</label></br>
	<select name="subject_id">
<?
$res = mysql_query('select `id`, `name` from `subjects`');
while($row = mysql_fetch_assoc($res)){
    ?>
    <option value="<?=$row['id']?>"<?php if($row['id'] == $sub_id) echo 'selected="selected"'  ?>><?=$row['id'],". ",$row['name']?></option>
    <?
}
?>
</select><br/>
</br>

<input id='submit' type='submit' value='Получить результат'><br/>
</fieldset>
<fieldset>
<label for='mark'>Средний балл:</label><br/>
<input readonly type='int' name='mark' size='10' value='<?php echo $rowA['mark']?>'><br/>

<label for='mark'>Общий ср. балл:</label><br/>
<input readonly type='int' name='mark' size='10' value='<?php echo $rowB['mark']?>'>
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