<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<title>Успеваемость студентов</title>
</head>

<h1><center>Успеваемость студентов</h1>
<link rel="stylesheet" href="style.css" />
</head>
<?php
require "connect2.php";
$resultX = mysql_query(" 
SELECT marks.id, marks.mark, marks.date, students.id, students.name, groups.name, subjects.name
FROM `marks` 
join `students` on (marks.stud_id=students.id) 
join `subjects` on (marks.sub_id=subjects.id) 
join `groups` on (students.group_id=groups.id) ") or die (mysql_error());
	//$row = mysql_fetch_assoc($resultX);
	//$id = $row['id'];
mysql_close();
?>

<body>
	<table cellpadding="0" cellspacing="0" border="0" id="table" class="sortable">
		<thead>
			<tr>
				<th class="sort"><h3>№ зачетки</h3></th>
				<th><h3>Имя</h3></th>
				<th><h3>Группа</h3></th>
				<th><h3>Предмет</h3></th>
				<th><h3>Оценка</h3></th>
				<th><h3>Дата</h3></th>
				<th class="nosort"><h3><center>Редактирование</center></h3></th>
			</tr>
		</thead>
		<tbody>
			
<?php
$rowsX = mysql_num_rows($resultX);

for($i=0;$i<$rowsX;$i++){
$mark_id = mysql_result($resultX,$i,'marks.id'); ?>	
	<tr>
		<td><?=mysql_result($resultX,$i,'students.id')?></td>
		<td><?=mysql_result($resultX,$i,'students.name')?></td>
		<td><?=mysql_result($resultX,$i,'groups.name')?></td>
		<td><?=mysql_result($resultX,$i,'subjects.name')?></td>
		<td><?=mysql_result($resultX,$i,'marks.mark')?></td>
		<td><?=mysql_result($resultX,$i,'marks.date')?></td>
		<td><center><a href='edit_mark2.php?id=<?=$mark_id?>'>Редактировать</center></a></td>
	</tr> 
<?}?>

		</tbody>
  </table>
	<div id="controls">
		<div id="perpage">
			<select onchange="sorter.size(this.value)">
			<option value="5">5</option>
				<option value="10" selected="selected">10</option>
				<option value="20">20</option>
				<option value="50">50</option>
				<option value="100">100</option>
			</select>
			<span>Кол-во записей</span></br>
		<br><a href="add_mark.php">Добавить оценку</a>
		</div>
		<div id="navigation">
			<img src="images/first.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
			<img src="images/previous.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
			<img src="images/next.gif" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
			<img src="images/last.gif" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
		</div>
		<div id="text">Страница <span id="currentpage"></span> из <span id="pagelimit"></span></div>
	</div>
	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript">
  var sorter = new TINY.table.sorter("sorter");
	sorter.head = "head";
	sorter.asc = "asc";
	sorter.desc = "desc";
	sorter.even = "evenrow";
	sorter.odd = "oddrow";
	sorter.evensel = "evenselected";
	sorter.oddsel = "oddselected";
	sorter.paginate = true;
	sorter.currentid = "currentpage";
	sorter.limitid = "pagelimit";
	sorter.init("table",1);
  </script>
  <br/><br/>

</br>
<div id="footer">
<p><a href="main.php">Назад</a></p>
</div>
<div id="footerR">
 <a href="students_list.php">Список студентов</a>
</div>
</body>
</html>