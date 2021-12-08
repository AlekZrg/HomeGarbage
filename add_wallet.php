<?php
require_once 'connect.php';
$insert_zindex = $max_index + 1;
if (isset($_POST['wallet_name'])) {
	$query = "INSERT INTO `wallets` (`id`, `description`, `ballance`, `z-index`) VALUES (NULL, '".$_POST['wallet_name']."', '0', '".$insert_zindex."');";
	mysqli_query($connect, $query);
	header('Location: ./IndexFinance.php');
	}
else "Something was wrong";
?>