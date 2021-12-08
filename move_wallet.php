<?php
require_once 'connect.php';
$q_get_zindex = "SELECT `z-index` FROM `wallets` WHERE `id` = ".$_GET['id'].";";
$query = mysqli_query($connect, $q_get_zindex);
$result = mysqli_fetch_array($query);
$curr_zindex = $result[0];

$next_zindex = $curr_zindex + 1;
$previous_zindex = $curr_zindex -1;

$query_next_id = mysqli_query($connect, "SELECT * FROM `wallets` WHERE `z-index` = ".$next_zindex.";");
$arr_next_id = mysqli_fetch_array($query_next_id);
$next_id = $arr_next_id[0];

$query_previous_id = mysqli_query($connect, "SELECT * FROM `wallets` WHERE `z-index` = ".$previous_zindex.";");
$arr_previous_id = mysqli_fetch_array($query_previous_id);
$previous_id = $arr_previous_id[0];

if ($_GET['direction'] == "down" && $curr_zindex >= $min_index && $curr_zindex < $max_index)
	{
	$change_curr = mysqli_query($connect, "UPDATE `wallets` SET `z-index` = '".$next_zindex."' WHERE `wallets`.`id` = ".$_GET['id'].";");
	$change_previous = mysqli_query($connect, "UPDATE `wallets` SET `z-index` = '".$curr_zindex."' WHERE `wallets`.`id` = ".$next_id.";");
	}
	
if ($_GET['direction'] == "up" && $curr_zindex > $min_index && $curr_zindex <= $max_index)
	{
	$change_curr = mysqli_query($connect, "UPDATE `wallets` SET `z-index` = '".$previous_zindex."' WHERE `wallets`.`id` = ".$_GET['id'].";");
	$change_previous = mysqli_query($connect, "UPDATE `wallets` SET `z-index` = '".$curr_zindex."' WHERE `wallets`.`id` = ".$previous_id.";");
	}

//if ($query_previous_id) echo $previous_id;
//else echo "something was wrong";

//echo $max_index;

//header('Location: IndexFinance.php');
header("Location: {$_SERVER['HTTP_REFERER']}");
?>