<?php

mysqli_query($connect, "SET lc_time_names = ru_RU;");
if (isset($_POST['calendar_of_move_from']) && isset($_POST['calendar_of_move_to'])) {
    $_SESSION['calendar_of_move_from'] = $_POST['calendar_of_move_from'];
    $_SESSION['calendar_of_move_to'] = $_POST['calendar_of_move_to'];
}
if (isset($_SESSION['calendar_of_move_from']) && isset($_SESSION['calendar_of_move_to'])) {
    $q_show_operations_move = mysqli_query($connect, "
        SELECT 
            movements.id AS move_id,
            DATE_FORMAT(movements.date, '%d %M %Y') AS show_date,
            movements.value AS value,
            w_from.description AS wallet_from,
            w_to.description AS wallet_to
        FROM `movements`
        JOIN wallets w_from on movements.wallet_from = w_from.id
        JOIN wallets w_to on movements.wallet_to = w_to.id
        WHERE movements.date >= '{$_SESSION['calendar_of_move_from']}' AND movements.date <= '{$_SESSION['calendar_of_move_to']}'
            ORDER BY movements.date;");
} else {
    $q_show_operations_move = mysqli_query($connect, "
        SELECT 
            movements.id AS move_id,
            DATE_FORMAT(movements.date, '%d %M %Y') AS show_date,
            movements.value AS value,
            w_from.description AS wallet_from,
            w_to.description AS wallet_to
        FROM `movements`
        JOIN wallets w_from on movements.wallet_from = w_from.id
        JOIN wallets w_to on movements.wallet_to = w_to.id
        WHERE movements.date >= '" . date('Y-m-d') . "' AND movements.date <= '" . date('Y-m-d') . "'
            ORDER BY movements.date;");
}
//if (isset($_POST['calendar_from']) && isset($_POST['calendar_to'])) echo $_POST['calendar_from']."<br>".$_POST['calendar_to'];
//echo "<div class=\"tab_content\"><button class=\"accordion\">Text for first tab</button><div class=\"panel\"><p>Lorem Ipsum</p></div></div>"; простой блок аккордиона для копипаста
echo "
<div class='tab_content'>
<div class='setting_window'>
        <form name='mass_op_move_delete' action='operations/mass_op_move_delete.php' method='post' id='id_op_move_del'></form>
        <form name='op_move_period_select' action='IndexFinance.php?page=operations&tab=move' method='post' id='id_op_move_period_select'></form>
        <b>Период с: </b><input type='date' form='id_op_move_period_select' name='calendar_of_move_from' value='";
if (isset($_SESSION['calendar_of_move_from'])) echo $_SESSION['calendar_of_move_from']; else echo date('Y-m-d');
echo "'>
        <b>по: <input type='date' form='id_op_move_period_select' name='calendar_of_move_to' value='";
if (isset($_SESSION['calendar_of_move_to'])) echo $_SESSION['calendar_of_move_to']; else echo date('Y-m-d');
echo "'></b>
        <a href='javascript: document.op_move_period_select.submit();' class='set_expenses_func_link'> Показать</a>";

echo "  <div style='margin: 5px 0 5px 0'>
        <input type='hidden' name='allSelectedOpMove' form='id_op_move_del'>
        <a href='#' class='set_expenses_func_link' onclick='docheck_new(\"op_move_del_id[]\", \"allSelectedOpMove\")'>Select all</a>
        <a href='javascript: document.mass_op_move_delete.submit();' class='set_expenses_func_link'>Remove</a>
        <a href='#' class='set_expenses_func_link accordion'>Add new</a>
            <div class='panel' style='width: max-content;'>

            <form action='operations/op_move_add.php' method='post' class='add_op_window'>
            <fieldset>
            <legend>Add new operation</legend>
            <div class='add_op_fields'>Select date: </div><input type='date' name='calendar_new_move_op' value='";
echo date("Y-m-d");
echo "'><br>
            <div class='add_op_fields'>Select wallet from:</div><select name='wallet_from_op'>";
showOption("wallet_from");
echo "</select><br>
            <div class='add_op_fields'>Select wallet to:</div><select name='wallet_to_op'>";
showOption("wallet_to");
echo "</select><br>
            <div class='add_op_fields'>Enter value:</div><input type='text' step='any' name='value_move_op' id='integerMove' onkeydown='check(event);' oninput='digits_show(\"integerMove\")'><br>
            <div align='right'><input type='submit' value='Enter' style='width: 80px;'</div>
            </fieldset>
            </form>
            </div>        
        </div>
        ";
while ($row = mysqli_fetch_array($q_show_operations_move)) {
    echo "<div class='alt_color op_show'>
            <span><input type='checkbox' name='op_move_del_id[]' value='" . $row['move_id'] . "' form='id_op_move_del'></span>
            <span class='op_show_span1'>" . $row['show_date'] . "</span>
            <span class='op_show_span2'>" . $row['wallet_from'] . "</span>
            <span class='op_show_span3'>" . $row['wallet_to'] . "</span>
            <span class='op_show_span4'>" . add_spaces($row['value']) . "р.</span>
          </div>";
}

echo "</div>
</div>";