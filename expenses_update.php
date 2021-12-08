<?php
require_once('connect.php');
//echo $_POST['exp_upd_id'];
//echo "<br>";
//echo $_POST['exp_upd_value'];
mysqli_query($connect, "UPDATE `IncomeAndExpenses` SET `value` = '".$_POST['exp_upd_value']."' WHERE `IncomeAndExpenses`.`id` = ".$_POST['exp_upd_id'].";");
header("Location: IndexFinance.php?page=settings&tab=expenses");
?>