<?php
require_once('connect.php');
mysqli_query($connect, "INSERT INTO `IncomeAndExpenses` (`id`, `value`, `type`) VALUES (NULL, '".$_GET['expanses_name']."', 1);");
header('Location: IndexFinance.php?page=settings&tab=expenses');
?>