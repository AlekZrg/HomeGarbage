<?php
require_once('../connect.php');
require_once('../functions.php');

$value_transaction = remove_spaces($_POST['value_new_op']);
if ($_POST['type_op'] == 1) $value_transaction = $value_transaction * -1;
if (isset($connect)) {
    $q_upd_wallet = mysqli_query($connect, "
        Update `wallets` SET `ballance` = `ballance` + {$value_transaction} WHERE `wallets`.id = {$_POST['wallet_new_op']};
    ");

    $q_op_add = mysqli_query($connect, "
        INSERT INTO `operations` (
                 `id`, 
                 `date`, 
                 `wallet_id`, 
                 `cat_id`, 
                 `cat_type_id`, 
                 `value`, 
                 `description`
        ) VALUES (
                  NULL, 
                  '".$_POST['calendar_new_op']."', 
                  '".$_POST['wallet_new_op']."', 
                  '".$_POST['income_new_op']."', 
                  '".$_POST['type_op']."', 
                  '".$value_transaction."', 
                  '".$_POST['description_new_op']."'
        );");
}
    else echo "var connect undefined";

if (isset($_POST['type_op']) && $_POST['type_op']) header('Location: ../IndexFinance.php?page=operations&tab=exp');
else header('Location: ../IndexFinance.php?page=operations');
