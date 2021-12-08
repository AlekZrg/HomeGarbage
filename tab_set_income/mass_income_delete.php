<?php
require_once '../connect.php';
if (isset($_GET['mycheckIncome'])) {
	$income_to_delete=$_GET['mycheckIncome'];
	foreach ($income_to_delete as $item) {
	  	mysqli_query($connect, "DELETE FROM `IncomeAndExpenses` WHERE `IncomeAndExpenses`.`id`=".$item.";");
		}
	header('Location: ../IndexFinance.php?page=settings');
	}
elseif (isset($_GET['mass_income_delete'])) {
	mysqli_query($connect, "DELETE FROM `IncomeAndExpenses` WHERE `IncomeAndExpenses`.`id`=".$_GET['id_to_delete'].";");
	header('Location: ../IndexFinance.php?page=settings');
	} 
else
	{
	echo "<div style=\"font-weight: bold; font-size: 16pt; margin: 50px;\">Nothing Selected</div>";
	echo "<script>
		setTimeout(() => {history.go(-1);}, 12000);
	      </script>";
	}

?>