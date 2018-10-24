<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<title>Список студентов студентов</title>
</head>

<h1><center>Список студентов</h1>
<link rel="stylesheet" href="style.css" />
</head>
<?php
require "connect2.php";
$resultX = mysql_query(" 
SELECT students.id, students.name, students.group_id, groups.name 
FROM `students` 
join `groups` on (students.group_id=groups.id)") or die (mysql_error());
	//$row = mysql_fetch_assoc($resultX);
	//$id = $row['id'];
mysql_close();
?>
	
<body>
	<table cellpadding="0" cellspacing="0" border="0" id="table" class="sortable">
		<thead>
			<tr>
				<th class="asc"><h3>№ зачетки</h3></th>
				<th class="head"><h3>Имя</h3></th>
				<th><h3>Группа</h3></th>
				<th class="nosort"><h3><center>Редактирование</center></h3></th>
				<th class="nosort"><h3><center>Средняя оценка</center></h3></th>
			</tr>
		</thead>
		<tbody>
<?php
$n=mysql_num_rows($resultX); 

for($i=0;$i<$n;$i++) {
$id = mysql_result($resultX,$i,'id'); ?>		
<tr>
		<td><?=mysql_result($resultX,$i,'students.id')?></td>
		<td><?=mysql_result($resultX,$i,'students.name')?></td>
		<td><?=mysql_result($resultX,$i,'groups.name')?></td>
		<td><center><a href='edit.php?id=<?=$id?>'>Редактировать</a></td>
		<td><center><a href='rating.php?id=<?=$id?>'>Высчитать</a></td>
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
			<br><a href="add.php">Добавить запись</a><br/><br/>
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
 <a href="students.php">Таблица оценок</a>
</div>
</body>
</html>