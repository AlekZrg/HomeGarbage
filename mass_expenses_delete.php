<?php
require_once 'connect.php';
if (isset($_GET['mycheck'])) {
	$expenses_to_delete=$_GET['mycheck'];
	foreach ($expenses_to_delete as $item) {
	  	mysqli_query($connect, "DELETE FROM `IncomeAndExpenses` WHERE `IncomeAndExpenses`.`id`=".$item.";");
		}
	header('Location: IndexFinance.php?page=settings&tab=expenses');
	}
elseif (isset($_GET['mass_expenses_delete'])) {
	mysqli_query($connect, "DELETE FROM `IncomeAndExpenses` WHERE `IncomeAndExpenses`.`id`=".$_GET['id_to_delete'].";");
	header('Location: IndexFinance.php?page=settings&tab=expenses');
	} 
else
	{
	echo "<div style=\"font-weight: bold; font-size: 16pt; margin: 50px;\">Nothing Selected</div>";
	echo "<script>
		setTimeout(() => {history.go(-1);}, 2000);
	      </script>";
	}

?>