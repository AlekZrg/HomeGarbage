<?php
function showOption($table) {
    global $connect;
if ($table == "wallets") {
    $show_option_wallets = mysqli_query($connect, "SELECT `id`,`description` FROM `wallets` order by `description`;");
    while ($row = mysqli_fetch_array($show_option_wallets)) {
        echo "<option value='".$row['id']."'>".$row['description']."</option>";
        }
    }
elseif ($table == "category_income") {
     $show_option_category = mysqli_query($connect, "SELECT `id`,`value` FROM `IncomeAndExpenses` WHERE `type` = 0 order by `value`;");
     while ($row = mysqli_fetch_array($show_option_category)) {
            echo "<option value='".$row['id']."'>".$row['value']."</option>";
        }
    }
elseif ($table == "category_expenses") {
    $show_option_category = mysqli_query($connect, "SELECT `id`,`value` FROM `IncomeAndExpenses` WHERE `type` = 1 order by `value`;");
    while ($row = mysqli_fetch_array($show_option_category)) {
        echo "<option value='".$row['id']."'>".$row['value']."</option>";
    }
    }
elseif (($table == "wallet_from") OR ($table == "wallet_to")) {
    $show_option_wallets = mysqli_query($connect, "SELECT `id`,`description` FROM `wallets` order by `z-index`;");
    while ($row = mysqli_fetch_array($show_option_wallets)) {
        echo "<option value='".$row['id']."'>".$row['description']."</option>";
    }
}
}


function remove_spaces($str) {
    $str = preg_replace('/\s/', '', $str);
    return $str;
}

function add_spaces($str) {
    $str = preg_replace('/\B(?=(\d{3})+(?!\d))/', ' ', $str);
    return $str;
}