<?php

echo "
<div class=\"setting_window\">
	<form name='mass_expenses_delete' action='mass_expenses_delete.php' method='GET' id='del_exp_form'></form>
	<form action='add_expenses.php' method='GET' id='add_exp_form'></form>
	<input type='hidden' name='mass_expenses_delete' value='all' form='del_exp_form'>
	
	<a href=# class='set_expenses_func_link' onclick='docheck_new(\"mycheck[]\", \"allselected\")'>Select all</a>
	<a href='javascript: document.mass_expenses_delete.submit();' class='set_expenses_func_link' form='del_exp_form'>Remove</a>
	<a href=# class='set_expenses_func_link accordion'>Add</a>
		<div class='panel' style='margin: 0px; padding: 0px;'>
		<div style='position: relative; left: 15px; width: 250px;'>
		
		<input type='text' name='expanses_name' style='margin: 0px; padding: 3px; width: 213px;' form='add_exp_form'>
		<button style=' height: 25px; margin: 0px; padding: 0px; float: right;' form='add_exp_form'>
		<img src='img/green_mark1.png' height='22px' style='margin: 0px; padding: 0px; cursor: pointer'></button>
		
		
		</div>
		</div>";

while ($row = mysqli_fetch_array($get_expenses)){
    echo "
		<div class='alt_color_check accordion' style='display: inline-block; padding: 2px;'>
		    <input type='checkbox' name='mycheck[]' value='".$row['id']."' form='del_exp_form'>
		</div>
			<div class='alt_color accordion' style='display: inline-block; position: relative; left: -4px; padding: 2px;'>
				<input type='hidden' name='allselected' form='del_exp_form'>
				<div class='list_of_expenses'>".$row['value']."</div>
				<div style='display: inline-block; float: right; margin-right: 25px;'>
				<a href='mass_expenses_delete.php?mass_expenses_delete=no&id_to_delete=".$row['id']."' class='set_expenses_func_link'>remove</a>
				</div>
			</div>
			
			<div class='panel' style='margin: 0px; padding: 0px; width: 302px;'>
				<form action='expenses_update.php' method='POST' id='edit_form".$row['id']."'></form>
				<input type='hidden' name='exp_upd_id' value='".$row['id']."' form='edit_form".$row['id']."'>
				<input type='text' name='exp_upd_value' style='margin: 5px; padding:3px; width: 255px;' value='".$row['value']."' form='edit_form".$row['id']."'>
				<button type='submit' style=' height: 25px; margin-top: 5px; padding: 0px; float: right;' form='edit_form".$row['id']."'>
				<img src='img/green_mark1.png' height='22px' style='margin: 0px; padding: 0px; cursor: pointer'></button>
			</div>";
}

echo "				
</div>";?>