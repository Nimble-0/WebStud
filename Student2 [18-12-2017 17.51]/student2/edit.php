<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link rel="stylesheet" type="text/css" href="style2.css">
<title>Вносим изменеиния</title>
<h2><center>Изменение данных</center></h2>
</head>
<body>
<?php
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
?>



<form  method='post' name='forma'>
<fieldset>
<input type='hidden' name='id' value='<?=$cur_id?>'><br/>
<label for='name'>Студент:</label></br>
<input type='text' name='name' size='20' value="<?php echo $name?>"><br/><br/>

<label for='student_group'>Группа:</label><br/>

<select name="group_id">
<?
$res = mysql_query('select `id`, `name` from `groups`');
while($row = mysql_fetch_assoc($res)){
    ?>
    <option value="<?=$row['id']?>" <?php if($row['id'] == $group_id) echo 'selected="selected"'  ?>><?=$row['name']?></option>
    <?
}
?>
</select>
<!--------------------->

</fieldset>
<br/>
<table width="10%" cellspacing="0" cellpadding="4">
<tr> 
     
     <td> <input id='submit' type='submit' formaction='update.php' name='edit' value='Редактировать запись'></br></td>
	 <td> <input id='submit' type='submit' formaction='delete.php' name='delete' value='Удалить запись'></td>
    </tr>
 </table>
</form>




<div id="footer">
	  <a href="students_list.php">Вернуться к списку</a></br>
	  <a href="main.php">На главную</a>
</div>
<div id="footerR">
 <a href="students.php">Таблица оценок</a>
</div>
</body>
</html>