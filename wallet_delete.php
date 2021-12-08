<?php
require_once 'connect.php';
$d_id = $_GET['id'];
$currentZindexARR = mysqli_query($connect, "SELECT * FROM `wallets` WHERE `wallets`.`id` = ".$d_id.";");
$cur_zindex = mysqli_fetch_assoc($currentZindexARR);
$q_wallet_delete = "DELETE FROM `wallets` WHERE `wallets`.`id` = ".$d_id.";";
$q_get_next_zwallets = "SELECT * FROM `wallets` WHERE `wallets`.`z-index` > ".$cur_zindex['z-index']." ORDER BY `z-index` ASC;";
mysqli_query($connect, $q_wallet_delete);
$get_next_zwallets = mysqli_query($connect, $q_get_next_zwallets);
while ($next_zwallets = mysqli_fetch_assoc($get_next_zwallets)) {
	$new_zindex = $next_zwallets['z-index']-1;
	$q_decrease = "UPDATE `wallets` SET `z-index` = ".$new_zindex." WHERE `wallets`.`id` = ".$next_zwallets['id'].";";
	$result=mysqli_query($connect, $q_decrease);
	}
header('Location: IndexFinance.php');