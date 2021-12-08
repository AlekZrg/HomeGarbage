<?php
require_once '../connect.php';
if (isset($_POST['op_move_del_id'])) {
    $op_move_del = $_POST['op_move_del_id'];
    $location = 'Location: ../IndexFinance.php?page=operations&tab=move';
}


foreach ($op_move_del AS $movement_id) {
    $q_get_wallets_id = mysqli_query($connect, "SELECT `wallet_from`, `wallet_to`, `value` FROM `movements` WHERE id = {$movement_id}");
    $result_arr = mysqli_fetch_row($q_get_wallets_id);
    $w_from = $result_arr[0];
    $w_to = $result_arr[1];
    $value = $result_arr[2];
    $q_increase_wallet = mysqli_query($connect, "UPDATE `wallets` SET `ballance` = `ballance` + {$value} WHERE id = {$w_from}");
    $q_decrease_wallet = mysqli_query($connect, "UPDATE `wallets` SET `ballance` = `ballance` - {$value} WHERE id = {$w_to}");
    $q_op_inc_del = mysqli_query($connect, "DELETE FROM `movements` WHERE id = {$movement_id};");
}
header($location);