<?php

echo "
<div class=\"setting_window\">
	<form name='mass_income_delete' action='tab_set_income/mass_income_delete.php' method='GET' id='del_form'></form>
	<form action='tab_set_income/add_income.php' method='GET' id='add_form'></form>
	<input type='hidden' name='mass_income_delete' value='all' form='del_form'>
	
	<a href=# class='set_expenses_func_link' onclick='docheck_new(\"mycheckIncome[]\", \"allIncomeSelected\")'>Select all</a>
	<a href='javascript: document.mass_income_delete.submit();' class='set_expenses_func_link' form='del_form'>Remove</a>
	<a href=# class='set_expenses_func_link accordion'>Add</a>
		<div class='panel' style='margin: 0px; padding: 0px;'>
		<div style='position: relative; left: 15px; width: 250px;'>
		
		<input type='text' name='income_name' style='margin: 0px; padding: 3px; width: 213px;' form='add_form'>
		<button style=' height: 25px; margin: 0px; padding: 0px; float: right;' form='add_form'>
		<img src='img/green_mark1.png' height='22px' style='margin: 0px; padding: 0px; cursor: pointer'></button>
		
		</div>
		</div>";
		
		while ($RowIncome = mysqli_fetch_array($get_income)){
		echo "
		
		<div class='alt_color_check accordion' style='display: inline-block; padding: 2px;'>
		
		    <input type='checkbox' name='mycheckIncome[]' value='".$RowIncome['id']."' form='del_form'>
		</div>
			<div class='alt_color accordion' style='display: inline-block; position: relative; left: -4px; padding: 2px;'>
				<input type='hidden' name='allIncomeSelected' form='del_form'>
				<div class='list_of_expenses'>".$RowIncome['value']."</div>
				<div style='display: inline-block; float: right; margin-right: 25px;'>
				<a href='tab_set_income/mass_income_delete.php?mass_income_delete=no&id_to_delete=".$RowIncome['id']."' class='set_expenses_func_link'>remove</a>
				</div>
			</div>
			
			<div class='panel' style='margin: 0px; padding: 0px; width: 302px;'>
				<form action='tab_set_income/income_update.php' method='POST' id='edit_form".$RowIncome['id']."'></form>
				<input type='hidden' name='income_upd_id' value='".$RowIncome['id']."' form='edit_form".$RowIncome['id']."'>
				<input type='text' name='income_upd_value' style='margin: 5px; padding:3px; width: 255px;' value='".$RowIncome['value']."' form='edit_form".$RowIncome['id']."'>
				<button type='submit' style=' height: 25px; margin-top: 5px; padding: 0px; float: right;' form='edit_form".$RowIncome['id']."'>
				<img src='img/green_mark1.png' height='22px' style='margin: 0px; padding: 0px; cursor: pointer'></button>
			</div>";  
		}
				
echo "				
</div>";?>