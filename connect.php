<?php
$connect = mysqli_connect('127.0.0.1','root','12345678','accaunting');
if (!$connect) {
	echo "connection failed<br>";
	die();
	}
	
$q_maxmin_zindex =  mysqli_query($connect, "SELECT MAX(`z-index`) AS `maxindex`, MIN(`z-index`) AS `minindex` FROM `wallets`;");
$arr_maxmin_index = mysqli_fetch_array($q_maxmin_zindex);
$max_index = $arr_maxmin_index['maxindex'];
$min_index = $arr_maxmin_index['minindex'];

//ниже нужно будет не забыть удалить если реализцю вывод основных таблиц через функцию.
$q_get_income = "SELECT * FROM `IncomeAndExpenses` WHERE `type` = 0 ORDER BY `value`;";
$get_income = mysqli_query($connect, $q_get_income);

$q_get_expenses = "SELECT * FROM `IncomeAndExpenses` WHERE `type` = 1 ORDER BY `value`;";
$get_expenses = mysqli_query($connect, $q_get_expenses);
?>