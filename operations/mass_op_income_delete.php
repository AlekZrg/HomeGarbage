<?php
require_once '../connect.php';
if (isset($_POST['op_inc_del_id'])) {
    $op_to_del = $_POST['op_inc_del_id'];
    $location = 'Location: ../IndexFinance.php';
}
elseif (isset($_POST['op_exp_del_id'])) {
    $op_to_del = $_POST['op_exp_del_id'];
    $location = 'Location: ../IndexFinance.php?page=operations&tab=exp';
}

foreach ($op_to_del AS $row) {
    $q_get_value_to_decrease_wallet = mysqli_query($connect, "SELECT `value`, `wallet_id` FROM `operations` WHERE id = {$row}");
    $result_arr = mysqli_fetch_row($q_get_value_to_decrease_wallet);
    $value_to_decrease_wallet = $result_arr[0];
    $wallet_id = $result_arr[1];
    $q_upd_wallet = mysqli_query($connect, "UPDATE `wallets` SET `ballance` = `ballance` - {$value_to_decrease_wallet} WHERE id = {$wallet_id}");
    $q_op_inc_del = mysqli_query($connect, "DELETE FROM `operations` WHERE id = ".$row.";");
}
header($location);