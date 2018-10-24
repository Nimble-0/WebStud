<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link rel="stylesheet" href="style2.css"  type="text/css">
<title>Редактирование</title>
<center><h2>Редактирование данных</h2></center>
</head>
<body>
<?php	
$cur_id = $_GET['id'];
if(!empty($cur_id)){
	require "connect2.php";
	$resultX = mysql_query(" 
	SELECT marks.id, marks.mark, marks.date, marks.stud_id, marks.sub_id
	FROM `marks`
	WHERE marks.id = $cur_id");
	$row = mysql_fetch_assoc($resultX);
	$stud_id = $row['stud_id'];
	$sub_id = $row['sub_id'];
	$mark = $row['mark'];
	$date = $row['date'];
}
 ?>
<form  method='post' name='forma'>
<fieldset>
<input type='hidden' name='id' value='<?=$cur_id?>'><br/>
<label for='student_id'>Cтудент:</label><br/>

	<select name="student_id">
<?
require "connect2.php";
$res = mysql_query('select `id`, `name` from `students`');
while($row = mysql_fetch_assoc($res)){
    ?>
    <option value="<?=$row['id']?>" <?php if($row['id'] == $stud_id) echo 'selected="selected"'  ?>><?=$row['id'],". ",$row['name']?></option>
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
    <option value="<?=$row['id']?>"<?php if($row['id'] == $sub_id) echo 'selected="selected"'  ?>><?=$row['id'],". ",$row['name']?></option>
    <?
}
?>
</select><br/>
<label for='mark'>Оценка:</label><br/>
<input type='int' name='mark' size='10' value='<?php echo $mark?>'><br/>

<label for='date'>Дата:</label><br/>
<input type='date' name='date' size='20' value='<?php echo $date?>'><br/>

</fieldset>
</br>

<table width="10%" cellspacing="0" cellpadding="4">
<tr> 
     
     <td> <input id='submit' type='submit' formaction='edit_mark_form.php' name='edit' value='Редактировать запись'></br></td>
	 <td> <input id='submit' type='submit' formaction='delete_mark_form.php' name='delete' value='Удалить запись'></td>
    </tr>
 </table>



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