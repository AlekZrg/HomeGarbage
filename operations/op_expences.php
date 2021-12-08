<?php
mysqli_query($connect, "SET lc_time_names = ru_RU;");
if (isset($_POST['calendar_of_exp_from']) && isset($_POST['calendar_of_exp_to'])) {
    $_SESSION['calendar_of_exp_from'] = $_POST['calendar_of_exp_from'];
    $_SESSION['calendar_of_exp_to'] = $_POST['calendar_of_exp_to'];
}
if (isset($_SESSION['calendar_of_exp_from']) && isset($_SESSION['calendar_of_exp_to'])) {
    $q_show_operations_income = mysqli_query($connect, "
        SELECT 
            operations.id AS show_id,
            DATE_FORMAT(operations.date, '%d %M %Y') AS show_date,
            wallets.description AS show_wallet,
            IAE.value AS show_category,
            ct.value AS show_category_type,
            operations.value AS show_costs,
            operations.description AS show_description
        FROM `operations`
        JOIN wallets on operations.wallet_id = wallets.id
        JOIN IncomeAndExpenses IAE on operations.cat_id = IAE.id
        JOIN category_types ct on operations.cat_type_id = ct.type
        WHERE operations.date >= '" . $_SESSION['calendar_of_exp_from'] . "' AND operations.date <= '" . $_SESSION['calendar_of_exp_to'] . "' AND operations.cat_type_id = '1'
            ORDER BY operations.date;");
        }
    else {
        $q_show_operations_income = mysqli_query($connect, "
        SELECT 
            operations.id AS show_id,
            DATE_FORMAT(operations.date, '%d %M %Y') AS show_date,
            wallets.description AS show_wallet,
            IAE.value AS show_category,
            ct.value AS show_category_type,
            operations.value AS show_costs,
            operations.description AS show_description
        FROM `operations`
        JOIN wallets on operations.wallet_id = wallets.id
        JOIN IncomeAndExpenses IAE on operations.cat_id = IAE.id
        JOIN category_types ct on operations.cat_type_id = ct.type
        WHERE operations.date >= '" . date('Y-m-d') . "' AND operations.date <= '" . date('Y-m-d') . "' AND operations.cat_type_id = '1'
            ORDER BY operations.date;");
    }

//if (isset($_POST['calendar_from']) && isset($_POST['calendar_to'])) echo $_POST['calendar_from']."<br>".$_POST['calendar_to'];
//echo "<div class=\"tab_content\"><button class=\"accordion\">Text for first tab</button><div class=\"panel\"><p>Lorem Ipsum</p></div></div>"; простой блок аккордиона для копипаста
echo "
<div class=\"tab_content\">
<div class=\"setting_window\">
        <form name='mass_op_exp_delete' action='operations/mass_op_income_delete.php' method='post' id='id_op_exp_del'></form>
        <form name='op_exp_period_select' action='IndexFinance.php?page=operations&tab=exp' method='post' id='id_op_exp_period_select'></form>
        <b>Период с: </b><input type=\"date\" form='id_op_exp_period_select' name=\"calendar_of_exp_from\" value='"; if (isset($_SESSION['calendar_of_exp_from'])) echo $_SESSION['calendar_of_exp_from']; else echo date('Y-m-d'); echo "'>
        <b>по: <input type=\"date\" form='id_op_exp_period_select' name=\"calendar_of_exp_to\" value='"; if (isset($_SESSION['calendar_of_exp_to'])) echo $_SESSION['calendar_of_exp_to']; else echo date('Y-m-d'); echo "'></b>
        <a href='javascript: document.op_exp_period_select.submit();' class='set_expenses_func_link'> Показать</a>";

echo "  <div style='margin: 5px 0 5px 0'>
        <input type='hidden' name='allSelectedOpExp' form='id_op_exp_del'>
        <a href='#' class='set_expenses_func_link' onclick='docheck_new(\"op_exp_del_id[]\", \"allSelectedOpExp\")'>Select all</a>
        <a href='javascript: document.mass_op_exp_delete.submit();' class='set_expenses_func_link'>Remove</a>
        <a href='#' class='set_expenses_func_link accordion'>Add new</a>
            <div class='panel' style='width: max-content;'>

            <form action='operations/op_add.php' method='post' class='add_op_window'>
            <fieldset>
            <legend>Add new operation</legend>
            <div class='add_op_fields'>Select date: </div><input type='date' name='calendar_new_op' value='"; echo date("Y-m-d"); echo "'><br>
            <div class='add_op_fields'>Select wallet:</div><select name='wallet_new_op'>"; showOption("wallets"); echo "</select><br>
            <div class='add_op_fields'>Select expenses:</div><select name='income_new_op'>"; showOption("category_expenses"); echo "</select><br>
            <div class='add_op_fields'>Enter value:</div><input type='text' step='any' name='value_new_op' id='integerExp' onkeydown='check(event);' oninput='digits_show(\"integerExp\")'><br>
            <div class='add_op_fields'>Enter description:</div><input type='text' name='description_new_op'><input type='hidden' name='type_op' value='1'><br>
            <div align='right'><input type='submit' value='Enter' style='width: 80px;'</div>
            </fieldset>
            </form>
            </div>        
        </div>
        <script>

        </script>
        ";

//$qq = mysqli_query($connect, $q_show_operations_income);
//$qqq = mysqli_fetch_array($q_show_operations_income);
//var_dump($qqq);
while ($row = mysqli_fetch_array($q_show_operations_income)) {
    echo "<div class='alt_color op_show'>
            <span><input type='checkbox' name='op_exp_del_id[]' value='".$row['show_id']."' form='id_op_exp_del'></span>
            <span class='op_show_span1'>".$row['show_date']."</span>
            <span class='op_show_span2'>".$row['show_wallet']."</span>
            <span class='op_show_span3'>".$row['show_category']."</span>
            <span class='op_show_span4'>".add_spaces($row['show_costs'])."р.</span>
            <span class='op_show_span5'>".$row['show_description']."</span>
          </div>";
}

echo "</div>
</div>";
//1. <input type='hidden' name='type_op' value='1'> - 1 для страницы с расходами, 0 для страницы с доходами.
//2. В запросе в самом верху "' AND operations.cat_type_id = '1' запрос на общее отображение списка операций сразу делим для одной страницы только расходы показываем 1, для другой только доходы 0
//3. Заменены переменные allSelectedOpExp, <input type='checkbox' name='op_exp_del_id[],