<?php
require_once('../connect.php');
require_once('../functions.php');

$date = $_POST['calendar_new_move_op'];
$value_transaction = remove_spaces($_POST['value_move_op']);
$wallet_from = $_POST['wallet_from_op'];
$wallet_to = $_POST['wallet_to_op'];

$q_wallet_from_decrease = "UPDATE `wallets` SET `ballance` = `ballance` - {$value_transaction} WHERE `wallets`.id  = '{$wallet_from}';";
$q_wallet_to_increase = "UPDATE `wallets` SET `ballance` = `ballance` + {$value_transaction} WHERE `wallets`.id = '{$wallet_to}';";
$q_insert = "INSERT INTO `movements` (`id`, `date`, `wallet_from`, `wallet_to`, `value`) VALUES (NULL, '{$date}', '{$wallet_from}', '{$wallet_to}', '$value_transaction');";
$decrease = mysqli_query($connect, $q_wallet_from_decrease);
$increase = mysqli_query($connect, $q_wallet_to_increase);
$insert_movements = mysqli_query($connect, $q_insert);


if ($decrease && $increase && $insert_movements) header('Location: ../IndexFinance.php?page=operations&tab=move');
else echo "<h1>Something was wrong!</h1>";